@extends('layouts.app')

@section('content')
<div class="p-6">

<h2 class="text-xl font-bold mb-4">Add Exercise</h2>

<form method="POST" action="{{ route('admin.exercises.store') }}">
@csrf

<input type="text" name="title" class="w-full border p-2 mb-3" placeholder="Title">

<textarea name="description" class="w-full border p-2 mb-3" placeholder="Description"></textarea>

<textarea name="solution" class="w-full border p-2 mb-3 h-40" placeholder="Code Solution"></textarea>

<textarea name="output" class="w-full border p-2 mb-3 h-40" placeholder="Output (Optional)"></textarea>

<button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>

</form>
</div>
@endsection
