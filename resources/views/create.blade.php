

@extends('layouts.app')

@section('content')
@section('title', '| Create oldal') 
@section('css', '../css/front.css')
@section('js', '../js/addButton.js')
   
    <h1>create recipe</h1>
    <form action="{{route('store')}}" method="post">
     @csrf
        <fieldset>
            <label for="name">recipe name: </label>
            <input type="text" name="name" id="name">
        </fieldset>
        <fieldset>
            <select name="courseId">
                @foreach ($course as $c )
                    <option value="{{$c->id}}">{{$c->courseName}}</option>
                @endforeach
                
                
            </select>
        </fieldset>

        <!--<fieldset>
            <label for="name">description: </label>
            <input type="text" name="desc" id="desc">
        </fieldset>-->

        <fieldset>
            <label for="name">instructions: </label><--same with ingredients>
            <ol>
                <li>
                    <input type="text" name="desc" id="desc">
                    </fieldset>  
                </li>
                <li>
                        
                      <input type="button" value="+" onClick="addInput();"> 
                       <input type="button" value="-" onClick="removeInput();">
                </li>>
            </ol>

        </fieldset>-->
        <!--<fieldset>
            @foreach($alg as $a)
                <input type="checkbox" name="{{ $a->allergenName }}" id="{{$a->id}}">
                <label for="{{ $a->allergenName }}">{{ $a->allergenName }}</label>
            @endforeach
           
           </fieldset> -->
           <!--make it add another <li>-->
        <button type="submit">save</button>
        <!--checkboxes for allergens-->
       
    </form>
    @endsection