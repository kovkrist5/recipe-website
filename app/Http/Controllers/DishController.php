<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Course;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
            'name' =>'required',

        ]);
        
       Dish::create($request->all());
       return redirect('front')->with('success');



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dish=Dish::find($id);
        if(!$dish){
            return("no dish found");
        }
        return view('show', compact('dish'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dish=Dish::find($id);

        return view('edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $dish= Dish::find($id);
        $dish->update($request->all());
        return redirect("dish/$id");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish, $id)
    {
        $dish= Dish::find($id);
        
        $dish->delete();
        return redirect('front')->with('success');
    }

}
