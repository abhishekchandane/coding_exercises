<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Category;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display all exercises.
     */
    public function index()
    {
        $exercises = Exercise::with('category')->orderBy('id', 'asc')->get();
        return view('admin.exercises.index', compact('exercises'));
    }

    /**
     * Show form to create a new exercise.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.exercises.create', compact('categories'));
    }

    /**
     * Store exercise.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'solution'    => 'nullable|string',
            'output'      => 'nullable|string',
        ]);

        Exercise::create($request->only(
            'title',
            'category_id',
            'description',
            'solution',
            'output'
        ));

        return redirect()->route('admin.exercises.index')
            ->with('success', 'Exercise Created Successfully!');
    }

    /**
     * Edit exercise.
     */
    public function edit(Exercise $exercise)
    {
        $categories = Category::all();
        return view('admin.exercises.edit', compact('exercise', 'categories'));
    }

    /**
     * Update exercise.
     */
    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'solution'    => 'nullable|string',
            'output'      => 'nullable|string',
        ]);

        $exercise->update($request->only(
            'title',
            'category_id',
            'description',
            'solution',
            'output'
        ));

        return redirect()->route('admin.exercises.index')
            ->with('success', 'Exercise Updated Successfully!');
    }

    /**
     * Delete exercise.
     */
    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->route('admin.exercises.index')
            ->with('success', 'Exercise Deleted Successfully!');
    }
}
