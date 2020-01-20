<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function store()
    {
        $attributes['image'] = request()->input('image');
        $attributes['label'] = request()->input('label');
        $attributes['ingredients'] = json_encode(request()->input('ingredients'));
        $attributes['calories'] = request()->input('calories');
        $attributes['weight'] = request()->input('totalWeight');
        $attributes['source_url'] = request()->input('url');

        auth()->user()->recipes()->create($attributes);
    } // 
}
