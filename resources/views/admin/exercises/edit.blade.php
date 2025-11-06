@extends('layouts.app')

@section('content')
<div class="p-6">

<h2 class="text-xl font-bold mb-4">Edit Exercise #{{ $exercise->id }}</h2>

<form method="POST" action="{{ route('admin.exercises.update', $exercise->id) }}">
@csrf @method('PUT')

<input type="text" name="title" class="w-full border p-2 mb-3" value="{{ $exercise->title }}">

<textarea name="description" class="w-full border p-2 mb-3">{{ $exercise->description }}</textarea>

<textarea name="solution" class="w-full border p-2 mb-3 h-40">{{ $exercise->solution }}</textarea>

<textarea name="output" class="w-full border p-2 mb-3 h-40">{{ $exercise->output }}</textarea>

<button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>

</form>
</div>
@endsection
