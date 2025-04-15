<?php

namespace App\Http\Controllers;

use App\Models\alg_dish;
use App\Models\Allergen;
use App\Models\Course;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Psy\Exception\BreakException;
use Symfony\Component\Console\Logger\ConsoleLogger;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dish= Dish::all();
        $alg= Allergen::all();
        $course= Course::all();
        return view("front", ['alg'=>$alg, 'course'=>$course,"dish"=>$dish]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $alg= Allergen::all();
        $course= Course::all();
        return view('create', ['alg'=>$alg, 'course'=>$course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|min:3',
            'courseId'=>'required',
            'desc'=> 'string',
            'img'=> 'nullable|mimes:png,jpg,jpeg',
            'inst'=> 'array',
            'ing'=>'array',
            'allergens'=>'array',
            'prep'=>'integer',
            'cooktime'=> 'nullable|integer',
        ]);


        if($request->has('image')){
            $img =$request->file('image');
            $ext= $img->getClientOriginalExtension() ;
            $filename=time().'.'.$ext;
            $imgpath='dishimg/';
            $img->move($imgpath,$filename);
        }
        else {
            $filename='dish.jpg';
        }
        $dish= Dish::create([
            'name'=> $request['name'],
            'courseId'=>$request['courseId'],
            'desc'=>$request['desc'],
            'img'=>$filename,
            'inst'=> $request['instructions'],
            'ing'=>$request['ingredients'],
            'prep'=>$request['prep'],
            'cooktime'=>$request['cooktime']

        ]);



        /*Ingredient::create([
            'dishid' =>$dish->id,
            'ing'=> json_encode($request->instructionsList),
        ]);*/

        if(empty($request['allergens'])){

            return redirect('dish/'.$dish->id)->with('success','');


        }
        else{

            foreach ($request['allergens'] as $a) {
                alg_dish::create([
                    'dishid'=>$dish->id,
                        'alg' => $a,
                ]);
            }
        }

       return redirect('dish/'.$dish->id)->with('success','');



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dish=Dish::with(['course', 'allergens'])->find( $id ) ;
        $alg= Allergen::all();
        $course= Course::all();
        if(!$dish){
            return redirect('/')->with('fail',"no dish found");
        }
        return view("show", ['alg'=>$alg, 'course'=>$course,"dish"=>$dish]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $dish=Dish::with(['course', 'allergens'])->find( $id );
        $alg= Allergen::all();
        $course= Course::all();
        return view('edit', ['alg'=>$alg, 'course'=>$course,'dish'=>$dish]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, )
    {
        $dish= Dish::find($id);

       $request->validate([
        'name' =>'required|min:3',
        'courseId'=>'required',
        'desc'=> 'string',
        'img'=> 'nullable|mimes:png,jpg,jpeg',
        'inst'=> 'array',
        'ing'=>'array',
        'allergens'=>'array'
        ]);


        if($request->has('image')){
            $imgpath= public_path('dishimg/'.$dish->img);
            if (File::exists($imgpath)) {
                File::delete($imgpath);
                }
            $img =$request->file('image');
            $ext= $img->getClientOriginalExtension() ;
            $filename=time().'.'.$ext;
            $imgpath='dishimg/';
            $img->move($imgpath,$filename);
        }
        else {
            $filename='dish.jpg';
        }

        $dish->update([
            'name'=> $request['name'],
            'courseId'=>$request['courseId'],
            'desc'=>$request['desc'],
            'img'=>$filename,
            'inst'=> $request['instructions'],
            'ing'=>$request['ingredients'],
        ]);

        alg_dish::where('dishid', $id)->delete();
        if(empty($request['allergens'])){

            return redirect('dish/'.$dish->id)->with('success','');
        }
        else{
            foreach ($request['allergens'] as $a) {
                alg_dish::create([
                    'dishid'=>$dish->id,
                        'alg' => $a,
                ]);
            }
        }
       return redirect("dish/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish=Dish::find($id);
        $imgpath= public_path('dishimg/'.$dish->img);
        if (File::exists($imgpath)) File::delete($imgpath);

        $dish->delete();

        return redirect('/')->with('success');
    }

}
