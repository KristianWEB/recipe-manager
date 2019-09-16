@extends('layouts.index')

@section('content')
            <div class="flex flex-wrap w-full justify-center mt-5">
            @forelse ($recipes as $recipe)
                    <Recipe title="{{ $recipe->title }}" 
                            image-url="{{ $recipe->image }}"
                            calories="{{ $recipe->calories }}" 
                            diet-labels="{{ $recipe->diet_label }}" 
                            ingredients="{{ json_encode($recipe->ingredients) }}" 
                            :parse-json="true"
                            {{-- :sourceURL="{{$recipe->sourceURL}}"  --}}
                            >
                        </Recipe>
            @empty
                No Recipes
            @endforelse
        </div>
@endsection