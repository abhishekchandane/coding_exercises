@extends('layouts.app')

@section('title', 'Guzzle Exercises')

@section('content')
<div class="flex min-h-screen bg-white text-gray-800 font-sans">


<aside class="w-64 bg-gray-100 border-r border-gray-300 p-4" x-data="{ search: '' }">

    <!-- Top: Home + Search -->
    <div class="flex items-center justify-between mb-4">

        <!-- Home Icon -->
        <a href="" class="text-gray-700 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 9.75l9-7.5 9 7.5M4.5 10.5v8.25A1.5 1.5 0 006 20.25h12a1.5 1.5 0 001.5-1.5v-8.25" />
            </svg>
        </a>

        <!-- Search Input with SVG -->
        <div class="relative w-40">
            <input type="text" x-model="search"
                   class="w-full border rounded px-3 py-1 text-sm pl-8"
                   placeholder="Search...">
            <svg class="w-4 h-4 text-gray-500 absolute left-2 top-2"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M9.5 17A7.5 7.5 0 109.5 2a7.5 7.5 0 000 15z" />
            </svg>
        </div>
    </div>

    <h2 class="text-sm tracking-wide text-gray-600 uppercase mb-4">Exercises</h2>

    @foreach($categories as $category)
    <div x-data="{ open: true }" class="mb-3">

        <!-- Category Header -->
        <button @click="open = !open"
            class="w-full flex justify-between items-center px-3 py-2 text-left bg-gray-200 rounded">
            <span>{{ $category->name }}</span>
            <span x-text="open ? '−' : '+'"></span>
        </button>

        <!-- Exercise List -->
        <ul x-show="open" class="mt-1 space-y-1" x-transition>
            @foreach($category->exercises as $ex)
            <li x-show="$el.innerText.toLowerCase().includes(search.toLowerCase())">
                <a href="{{ route('exercises.show', $ex->id) }}"
                   class="block px-6 py-2 rounded 
                   {{ isset($exercise) && $exercise->id == $ex->id 
                      ? 'bg-blue-600 text-white'
                      : 'hover:bg-gray-200 text-gray-800' }}">
                   {{ $ex->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endforeach

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
