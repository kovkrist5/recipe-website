@extends('layouts.app')

@section('content')
@section('title', '| Create oldal') 
@section('css', '../css/front.css')
   
    <h1>create recipe</h1>
    <form action="{{route('store')}}" method="post">
     @csrf
        <fieldset>
            <label for="name">recipe name: </label>
            <input type="text" name="name" id="name">
        </fieldset>
        <fieldset>
            <select name="courseId" id="">
                
                <option value="1">appetizer</option>
                <option value="2">soup</option>
                <option value="3">main dish</option>
                <option value="4">side dish</option>
                <option value="5">salad</option>
                <option value="6">dessert</option>
                <option value="7">pastry</option>
                <option value="8">other</option>
            </select>
        </fieldset>

        <fieldset>
            <label for="name">description: </label>
            <input type="text" name="desc" id="desc">
        </fieldset>

        <fieldset>
            <label for="name">instructions: </label><!--same with ingredients-->
            <ol>
                <li>
                    <input type="text" name="desc" id="desc">
                    </fieldset>  
                </li>
            </ol>
            <button>+</button><!--make it add another <li>-->
        <button type="submit">save</button>
        <!--checkboxes for allergens-->
        @foreach ($alg as $a)
            <input type="checkbox" name="checkbox" id="{{$a->id}}">
            <label for="checkbox">{{ $a->name }}</label>
        @endforeach
    </form>
    @endsection