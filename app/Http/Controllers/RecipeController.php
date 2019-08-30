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

    public function store(Request $request)
    {
        // validate
        $validatedData = $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'diet_label' => 'required',
            'health_label' => 'required',
            'calories' => 'required',
        ]);

        // persist
        Recipe::create($validatedData);
    }
}
