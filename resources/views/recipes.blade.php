<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div id="app">
    <navBar class="bg-black text-white px-12 py-5">
		<ul class='flex justify-between'>
            <div class="flex">
                <li class='mr-6'>
                    <a href='#'>HOME</a>
                </li>
                <li class='mr-6'>
                    <a href='#'>RECIPES</a>
                </li>
                @if(Auth::user())
                        <li class='mr-6'>
                            <a href="/storage">STORAGE</a>
                        </li>
                        @else
                        <li class="mr-6">
                            <button @click="$modal.show('login')" >STORAGE</li>
                        </li>
                @endif
            </div>
            <div class="flex">
                @if(Route::has('login'))
                        @auth
                        <li>
                            <a href="{{ url('/home') }}">{{ __('Account') }}</a>
                        </li>
                        @else
                        <li>
                            <button @click="$modal.show('login')" class="mr-6">{{ __('SIGN IN') }}</button>
                        </li>
                        @endauth
                @endif
            </div>
		</ul>
    </navBar>
    <main>
            <recipes>
        </recipes>
    </main>
</div>

<script src="/js/app.js"></script>
</body>
</html>
