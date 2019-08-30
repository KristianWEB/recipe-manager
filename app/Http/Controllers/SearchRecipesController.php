<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchRecipesController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'calories' => 'required',
        ]);
        return response()->json($validatedData);
    }
}
