<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;

class GuzzleExercisesController extends Controller
{
    /**
     * Display list of all exercises
     */
    public function index()
    {
        $exercises = Exercise::orderBy('id')->get();
        return view('exercises.guzzle-exercises', compact('exercises'));
    }

    /**
     * Display a single exercise by ID
     */
    public function show($id)
    {
        $exercise = Exercise::findOrFail($id);

        return view('exercises.show', [
            'exercise' => $exercise,
            'id' => $id
        ]);
    }
}
