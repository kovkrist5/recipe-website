<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
   
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
    </form>
</body>
</html>