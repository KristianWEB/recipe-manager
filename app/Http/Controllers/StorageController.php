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

        return view('storage', compact('recipes'));
    }
}
