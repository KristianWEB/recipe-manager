@extends('layouts.index')

@section('content')
            @forelse ($recipes as $recipe)
                <Recipe :title="{{$recipe->title}}" 
                        :imageURL="{{$recipe->image}}"
                        :calories="{{$recipe->calories}}" 
                        :dietLabels="{{$recipe->diet_label}}" 
                        :ingredients="{{$recipe->ingredients}}" 
                        {{-- :sourceURL="{{$recipe->sourceURL}}"  --}}
                        >
                    </Recipe>
            @empty
                No Recipes
            @endforelse
        </div>
@endsection