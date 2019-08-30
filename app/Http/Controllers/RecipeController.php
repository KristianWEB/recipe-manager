<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes');
    }

    public function store()
    {
        // validate

        $attributes = request()->validate([
            'image' => 'required',
            'title' => 'required',
            'ingredients' => 'required|array',
            'diet_label' => 'required|array',
            'calories' => 'required',
        ]);

        $attributes['ingredients'] = json_encode($attributes['ingredients']);
        $attributes['diet_label'] = json_encode($attributes['diet_label']);

        auth()->user()->recipes()->create($attributes);

        return redirect('/storage');
    }
}
