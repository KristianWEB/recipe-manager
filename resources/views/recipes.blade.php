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
                <li class='mr-6'>
                    <a href='#'>STORAGE</a>
                </li>
            </div>
            <div class="flex">
                @if(Route::has('login'))
                        @auth
                        <li>
                            <a href="{{ url('/home') }}">{{ __('Home') }}</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="mr-6">{{ __('LOGIN') }}</a>
                        </li>
                            @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                            </li>
                            @endif
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
