<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = auth()->user()->recipes;

        $recipes->map(function ($recipe) {
            return $recipe->ingredients = json_decode($recipe->ingredients);
        });

        return $recipes;
    }

    public function store()
    {

        $attributes['image'] = request()->input('image');
        $attributes['label'] = request()->input('label');
        $attributes['ingredients'] = json_encode(request()->input('ingredients'));
        $attributes['calories'] = request()->input('calories');
        $attributes['weight'] = request()->input('totalWeight');
        $attributes['url'] = request()->input('url');

        auth()->user()->recipes()->create($attributes);
    } // 

    public function create()
    {

        $attributes['image'] = request()->input('image');
        $attributes['label'] = request()->input('label');
        $attributes['ingredients'] = json_encode(request()->input('ingredients'));
        $attributes['calories'] = request()->input('calories');
        $attributes['weight'] = request()->input('totalWeight');
        $attributes['url'] = request()->input('url');

        auth()->user()->recipes()->create($attributes);
    } // 
}
