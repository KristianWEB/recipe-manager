<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    //

    public function index()
    {
        $recipes = auth()->user()->recipes;

        $recipes->map(function ($item, $key) use ($recipes) {
            $recipes[$key]->ingredients = (json_decode($item->ingredients));
        });

        return view('storage', compact('recipes'));
    }
}
