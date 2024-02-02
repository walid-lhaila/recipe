@extends('recipe.layout')

@section('content')

@if ($recipes->isEmpty())
<!-- component -->
<div class=" w-full px-16 md:px-0 h-screen flex items-center justify-center">
    <div class=" border border-gray-200 flex flex-col items-center justify-center px-4 md:px-8 lg:px-24 py-8 rounded-lg shadow-2xl">
        <p class="text-6xl md:text-7xl lg:text-9xl font-bold tracking-wider text-[#8b5e34]">"{{ $results }}"</p>
        <p class="text-2xl md:text-3xl lg:text-5xl font-bold tracking-wider text-black mt-4">No results found </p>
        <a href="recettes" class="flex items-center space-x-2 bg-[#8b5e34] text-gray-100 px-4 py-2 mt-6 rounded transition duration-150" title="Return Home">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
            </svg>
            <span>Return Home</span>
        </a>
    </div>
</div>
@else

<div class="w-full xl:w-10/12 px-4 mx-auto mt-8">
    <div id="serachResult" class="rounded-t mb-0 px-4 py-3 border-0 bg-orange-400 ">
        <div class="flex flex-wrap items-center text-white ">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-bold text-base text-blueGray-700">Search Results for "{{ $results }}"</h3>
            </div>
        </div>
    </div>


    <div class="flex flex-wrap justify-center gap-10 mt-10">
        @foreach ($recipes as $recipe)
        <div class="max-w-2xl overflow-hidden bg-gray-200 rounded-lg shadow-md ">
            <img class="object-cover w-full h-64" src="https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Article">
        
            <div class="p-6">
                <div>
                    <span class="text-xs font-medium text-orange-400 uppercase dark:text-orange-400">{{ $recipe->category->name }}</span>
                    <a href="#" class="block mt-2 text-xl font-semibold text-gray-800 transition-colors  dark:text-white hover:text-gray-600 ">{{ $recipe->name}}</a>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-500">{{ $recipe->description}}</p>
                    <p class="mt-2 text-sm  dark:text-orange-300">{{ $recipe->ingredients}}</p>
    
                </div>
        
                <div class="mt-4">
                    <div class="flex gap-96 items-center">
                        <span class="mx-1 text-xs text-gray-600 dark:text-gray-500">{{ $recipe->created_at}}</span>
                        <div class="flex gap-3 items-center">
                            <a href="{{ url('delete-recipe/'.$recipe->id)}}" class="btn btn-danger btn-sm text-red-600"><svg class="h-8 w-8 hover:text-red" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg></a>
                            <a href="{{ url('/edit/'.$recipe->id) }}" class="btn btn-primary btn-sm text-yellow-400"><svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#000000"/>
                                </svg></a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <script src="{{ url('js/search.js')}}"></script>
@endsection