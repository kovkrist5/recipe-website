<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>edit {{$dish->name}}</h1>
<form action="{{route('update', $dish->id)}}" method="post">
    @method('PUT')
       <fieldset>
           <label for="name">recipe name: </label>
           <input type="text" name="name" id="name" value="{{old('name', $dish->name)}}">
       </fieldset>
       <fieldset>
           <select name="courseId" id="">
               <option value="8">other</option>
           </select>
       </fieldset>
       <button type="submit">save</button>
   </form>
</body>
</html>

