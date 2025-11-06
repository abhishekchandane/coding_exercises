@extends('layouts.app')

@section('title', 'Guzzle Exercises')

@section('content')
<div class="flex min-h-screen bg-white text-gray-800 font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-100 border-r border-gray-300 p-4">
        <h2 class="text-sm tracking-wide text-gray-600 uppercase mb-4">Laravel Guzzle Exercises</h2>

        <ul class="space-y-1">
            @foreach($exercises as $exercise)
            <li>
                <a href="{{ route('exercises.show', $exercise->id) }}"
                   class="block px-3 py-2 rounded hover:bg-gray-200 hover:text-black">
                   {{ $exercise->id }}. {{ $exercise->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-900">Laravel Guzzle - Exercises</h1>

        @foreach($exercises as $exercise)
        <div class="bg-white p-6 rounded shadow border border-gray-200 mb-6">
            <h2 class="text-lg font-semibold text-gray-900">
                {{ $exercise->id }}. {{ $exercise->title }}
            </h2>

            <p class="text-gray-600 mt-2">{{ $exercise->description }}</p>

            <a href="{{ route('exercises.show', $exercise->id) }}"
               class="inline-block mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
               Open Solution
            </a>
        </div>
        @endforeach
    </div>

</div>
@endsection
