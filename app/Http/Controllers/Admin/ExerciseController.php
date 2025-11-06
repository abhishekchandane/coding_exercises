<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
public function index(Request $request)
{
    $search = $request->input('search');

    $exercises = Exercise::when($search, function($query, $search) {
            return $query->where('title', 'LIKE', "%{$search}%")
                         ->orWhere('description', 'LIKE', "%{$search}%");
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);

    return view('admin.exercises.index', compact('exercises', 'search'));
}


    public function create()
    {
        return view('admin.exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'solution' => 'required',
        ]);

        Exercise::create($request->all());

        return redirect()->route('admin.exercises.index')->with('success', 'Exercise Created Successfully');
    }

    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(Request $request, $id)
    {
        $exercise = Exercise::findOrFail($id);

        $exercise->update($request->all());

        return redirect()->route('admin.exercises.index')->with('success', 'Exercise Updated Successfully');
    }

    public function destroy($id)
    {
        Exercise::findOrFail($id)->delete();
        
        return redirect()->route('admin.exercises.index')->with('success', 'Exercise Deleted Successfully');
    }
}
