<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div class="h-screen-12 bg-black"></div>
<main class="w-full h-screen-88 flex">


<section class="w-1/4 bg-gradient-1 px-3 py-6">
<div class="flex flex-col justify-center items-center mt-8">
<figure class="w-40 h-40 bg-white rounded-full">
<!-- <img src="" alt="User photo"> -->
</figure>
<h3 class="mt-5 text-4xl text-white">Fuwclash</h3>
</div>
</section>

<section class="flex-1 bg-gray-100 px-3 py-6">
<div class="flex flex-col items-center mt-8">
<h1 class="text-center text-4xl">Account overview</h1>
</div>

<div class="flex flex-col items-center mt-24">

<div class="w-1/2 mb-5 font-bold text-xl">Your current email:</div>
<div class="w-1/2 flex border-bottom-1 mb-12">
<span class="inline-block mr-auto text-3xl mb-3">hui@hui.com</span> <i class="material-icons inline-block icon-size-3">edit</i>
</div>

<div class="w-1/2 mb-5 font-bold text-xl">Your current password:</div>
<div class="w-1/2 flex border-bottom-1">
<span class="inline-block mr-auto text-3xl mb-3">******************</span> <i class="material-icons inline-block icon-size-3">edit</i>
</div>

</div>


<div class="w-full mt-24 text-center">
<a href="http://recipemanager.test/storage" class="px-6 py-6 bg-blue-btn-1 rounded-full text-white text-xl">See your saved recipes</a>
</div>
</section>



</main>
</body>
</html>