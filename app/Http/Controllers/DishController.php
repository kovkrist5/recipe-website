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
        return view('front', compact('dish'));
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
            'allergens'=>'array'

            /*'ing.*'=>'exists:ing,dishid'*/


        ]);
        if($request->has('image')){
            $img =$request->file('image');
            $ext= $img->getClientOriginalExtension() ;
            $filename=time().'.'.$ext;
            $imgpath='dishimg/';
            $img->move($imgpath,$filename);
        }
        else{
            $filename='dish.jpg';
        }
        $dish= Dish::create([
            'name'=> $request['name'],
            'courseId'=>$request['courseId'],
            'desc'=>$request['desc'],
            'img'=>$filename,
            'inst'=> $request['instructions'],
            'ing'=>$request['ingredients'],

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
        $algid= alg_dish::where('dishid', $dish->id)->get();
        if(!$dish){
            return("no dish found");
        }
        //return view('show', compact('dish'));
        return view("show", ["algid"=>$algid,'alg'=>$alg, 'course'=>$course,"dish"=>$dish]);
       // return ["algid"=>$algid, 'course'=>$course,"dish"=>$dish];

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
        $algid= alg_dish::where('dishid', $dish->id)->get();
       // $message= "idk whats going on";

       $request->validate([
        'name' =>'required|min:3',
        'courseId'=>'required',
        'desc'=> 'string',
        //'img'=> 'nullable|mimes:png,jpg,jpeg',
        'inst'=> 'array',
        'ing'=>'array',
        'allergens'=>'array'

        


        ]);
        $dish->update([
            'name'=> $request['name'],
            'courseId'=>$request['courseId'],
            'desc'=>$request['desc'],
            'inst'=> $request['instructions'],
            'ing'=>$request['ingredients'],

        ]);
        if(empty($request['allergens'])){
           
            return redirect('dish/'.$dish->id)->with('success','');


        }
        else{
            foreach ($algid as $alg)
                foreach($request['allergens'] as $a){
                 {
                    $alg->update([
                        'dishid'=>$dish->id,
                        'alg' => $a,
                    ]);
                    
                }
                
                
            }
            
            
        }
        /*$dish->save();
        $algid->save();*/
        
       // return redirect("dish/$id");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish=Dish::find($id);
        $imgpath= public_path('dishimg/'.$dish->img);

       if (file_exists($imgpath)) {
                //Storage::disk()->delete("../dishimg/1743760478.jpg");
            unlink($imgpath);
             
        }
            

        
        $dish->delete();



        return redirect('front')->with('success');
    }

}
