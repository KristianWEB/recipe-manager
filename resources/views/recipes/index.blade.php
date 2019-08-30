<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipe Manager</title>
</head>
<body>
   <ul>
    @forelse($recipes as $recipe)
    <li>
        {{ $recipe->title }}
    </li>
    @empty
    no recipes saved
    @endforelse
   </ul> 
</body>
</html>