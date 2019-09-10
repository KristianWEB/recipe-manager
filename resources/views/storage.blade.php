<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @forelse ($recipes as $recipe)
            <h1> {{ $recipe->title }}</h1>
        @empty
            No Recipes
        @endforelse
</body>
</html>