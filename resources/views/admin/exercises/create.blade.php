@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-white text-gray-800">


    <div class="flex-1 p-8">
        <h2 class="text-2xl font-bold mb-6">Add Exercise</h2>

        <form method="POST" action="{{ route('admin.exercises.store') }}">
        @csrf

        <label class="block mb-1 font-medium">Title</label>
        <input type="text" name="title" class="w-full border p-2 rounded mb-4">

        <label class="block mb-1 font-medium">Category</label>
        <select name="category_id" class="w-full border p-2 rounded mb-4">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <label class="block mb-1 font-medium">Description</label>
        <textarea name="description" class="w-full border p-2 rounded mb-4"></textarea>

        <label class="block mb-1 font-medium">Solution (Code)</label>
        <textarea name="solution" class="w-full border p-2 rounded mb-4 h-40"></textarea>

        <label class="block mb-1 font-medium">Output (Optional)</label>
        <textarea name="output" class="w-full border p-2 rounded mb-4 h-40"></textarea>

        <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
            Save
        </button>
        </form>
    </div>

</div>
@endsection
