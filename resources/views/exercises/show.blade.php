@extends('layouts.app')

@section('title', $exercise['title'])

@section('content')
<div class="min-h-screen bg-white p-8 text-gray-800">

    <h1 class="text-2xl font-bold mb-4">{{ $exercise['title'] }}</h1>

    <p class="mb-4 text-gray-600">{{ $exercise['description'] }}</p>

    <h3 class="text-lg font-semibold mt-4 mb-2">Code:</h3>
    <pre id="exercise-code" class="bg-gray-100 p-4 rounded-md border border-gray-300 whitespace-pre text-sm text-gray-900 overflow-auto">
{{ $exercise['solution'] }}
    </pre>

    <h3 class="text-lg font-semibold mt-6 mb-2">Expected Output:</h3>
    <pre class="bg-gray-900 text-green-400 p-4 rounded-md border border-gray-700 whitespace-pre text-sm overflow-auto">
{{ $exercise['output'] ?? 'No output defined for this exercise.' }}
    </pre>

    <button id="openPlayground"
        class="mt-6 inline-block px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
        Try in Online Playground
    </button>

    <script>
    document.getElementById('openPlayground').addEventListener('click', function() {
        let code = document.getElementById('exercise-code').innerText;
        let encoded = encodeURIComponent(code);

        window.open(
            "https://onecompiler.com/php?code=" + encoded,
            "_blank"
        );
    });
    </script>

    <div class="mt-6 flex gap-3">
        @if($id > 1)
        <a href="{{ route('exercises.show', $id - 1) }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded">
           ← Previous
        </a>
        @endif

        <a href="{{ route('exercises.show', $id + 1) }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
           Next →
        </a>
    </div>

</div>
@endsection
