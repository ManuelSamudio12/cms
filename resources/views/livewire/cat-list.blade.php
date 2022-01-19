<div>
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="items-center text-center">
            <input wire:model.debounce.500ms="search" type="text" placeholder="Search cat by Name"
                   class="h-12 px-4 text-sm text-gray-700 bg-white border border-gray-300 rounded-md
               lg:w-20 xl:transition-all xl:duration-300 xl:w-36 xl:focus:w-44 dark:bg-gray-900
               dark:text-gray-300 dark:border-gray-600 dark:placeholder-gray-400">

            <a class="h-12 px-4 inline-flex items-center bg-gray-800 border border-transparent
                    rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                    active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300
                    disabled:opacity-25 transition" href="{{ route('create.cat') }}">Add Cat</a>
        </div>

        @if($cats->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 py-8">
                @foreach($cats as $cat)
                    <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col justify-center items-center">
                        <div>
                            <img class="object-center object-cover h-auto w-full"
                                 src="{{ $cat->photo ? url('storage/'. $cat->photo) : 'https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2060&q=80' }}"
                                 alt="photo"
                            >
                        </div>
                        <div class="text-center py-8 sm:py-6">
                            <p class="text-xl text-gray-700 font-bold mb-2">{{ $cat->name }}</p>
                            <p class="text-base text-gray-400 font-normal text-left">{{ Str::limit($cat->description, 40) }}</p>
                        </div>
                        <div class="py-4">
                            <a class="bg-gray-800 text-white px-4 py-2 rounded-md mr-2" href="{{ route('edit.cat', $cat->id) }}">Edit</a>
                            <button wire:click="deleteCat('{{ $cat->id }}')" class="bg-white text-red-500 px-4 py-2 rounded mr-auto hover:underline">Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="py-2">
                {{ $cats->links() }}
            </div>
        @else
            <h2 class="text-center py-12">
                You don't have any cat registered.
            </h2>
        @endif
</div>
