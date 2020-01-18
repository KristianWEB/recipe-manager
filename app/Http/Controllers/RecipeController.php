<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function store()
    {
        // validate
        $attributes = request()->all();

        // $attributes['ingredients'] = json_encode($attributes['ingredients']);

        // auth()->user()->recipes()->create($attributes);
        return $attributes;
    }
}
