<?php

namespace App\Http\Controllers;

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
