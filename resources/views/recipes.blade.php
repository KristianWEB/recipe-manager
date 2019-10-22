@extends('layouts.index')

@section('content')
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
                            <a href="{{ url('/account') }}">{{ __('Account') }}</a>
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
<Recipes></Recipes>
    </main>
@endsection