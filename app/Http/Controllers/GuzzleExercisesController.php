<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\Category;

class GuzzleExercisesController extends Controller
{
    /**
     * Display list of all exercises
     */
    public function index()
    {
        $categories = Category::with('exercises')->get(); // For Sidebar
        $exercises = Exercise::orderBy('id')->get(); // For Main List

        return view('exercises.guzzle-exercises', compact('categories', 'exercises'));
    }


    /**
     * Display a single exercise by ID
     */
    public function show(Exercise $exercise)
    {
        $next = Exercise::where('id', '>', $exercise->id)->orderBy('id')->first();
        $prev = Exercise::where('id', '<', $exercise->id)->orderBy('id', 'desc')->first();

        $categories = Category::with('exercises')->get(); // Add this line

        return view('exercises.show', compact('exercise', 'next', 'prev', 'categories'));
    }

}
