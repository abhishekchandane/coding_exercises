@extends('layouts.app')

@section('content')
<div class="p-6">

    <!-- Search Bar -->
    <form method="GET" action="{{ route('admin.exercises.index') }}" class="mb-4 flex gap-2">
        <input type="text" name="search" value="{{ $search }}" class="border p-2 w-64"
               placeholder="Search exercises...">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Search</button>
    </form>

    <!-- Add Button -->
    <a href="{{ route('admin.exercises.create') }}" class="px-4 py-2 bg-green-600 text-white rounded inline-block mb-4">
        + Add Exercise
    </a>

    <!-- Table -->
    <table class="w-full border">
        <tr class="bg-gray-100">
            <th class="p-2 text-left">ID</th>
            <th class="p-2 text-left">Title</th>
            <th class="p-2 text-left">Actions</th>
        </tr>

        @forelse($exercises as $exercise)
        <tr class="border-b">
            <td class="p-2">{{ $exercise->id }}</td>
            <td class="p-2">{{ $exercise->title }}</td>
            <td class="p-2 flex gap-2">

                <a href="{{ route('admin.exercises.edit', $exercise->id) }}"
                   class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>

                <form action="{{ route('admin.exercises.destroy', $exercise->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="px-3 py-1 bg-red-600 text-white rounded"
                        onclick="return confirm('Delete this exercise?')">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="p-4 text-center text-gray-500">No exercises found.</td>
        </tr>
        @endforelse
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $exercises->links() }}
    </div>

</div>
@endsection
