<aside class="w-64 bg-gray-50 border-r border-gray-200 p-4 overflow-y-auto"
       x-data="{ search: '' }">

    <!-- Header with Home + Search -->
    <div class="flex items-center justify-between mb-4">

        <!-- Home Icon -->
        <a href=" " class="text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 9.75l9-7.5 9 7.5M4.5 10.5v8.25A1.5 1.5 0 006 20.25h12a1.5 1.5 0 001.5-1.5v-8.25" />
            </svg>
        </a>

        <!-- Search -->
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

    <h2 class="text-xs tracking-wide text-gray-500 uppercase mb-3">Exercises</h2>

    @foreach($categories as $category)
    <div x-data="{ open: true }" class="mb-2 border-b border-gray-200 pb-2">

        <!-- Category Header -->
        <button @click="open = !open"
            class="w-full flex justify-between items-center px-2 py-1 text-left bg-gray-100 rounded hover:bg-gray-200">

            <div class="flex items-center gap-2">
                <!-- Folder Icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-4 w-4 text-gray-600"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7h4l2 2h11v9H3V7z" />
                </svg>

                <span class="text-sm font-semibold text-gray-700">{{ $category->name }}</span>
            </div>

            <span class="text-xs" x-text="open ? '–' : '+'"></span>
        </button>

        <!-- Exercise List -->
        <ul x-show="open" class="mt-1 ml-1 space-y-1" x-transition>
            @foreach($category->exercises as $ex)

            @php
                $active = isset($exercise) && $exercise->id == $ex->id;
            @endphp

            <li x-show="$el.innerText.toLowerCase().includes(search.toLowerCase())">
                <a href="{{ route('exercises.show', $ex->id) }}"
                   class="block px-4 py-1 rounded text-sm font-medium
                   {{ $active 
                      ? 'bg-blue-600 text-white'
                      : 'text-gray-700 hover:bg-blue-100 hover:text-blue-700' }}">
                   {{ $ex->title }}
                </a>
            </li>

            @endforeach
        </ul>
    </div>
    @endforeach

</aside>
