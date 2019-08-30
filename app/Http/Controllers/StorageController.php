<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    //

    public function index()
    {
        // return view('storage');
        $recipes = Recipe::all();

        return view('recipes.index', compact('recipes'));
    }
}
