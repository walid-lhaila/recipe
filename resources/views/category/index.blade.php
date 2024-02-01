@extends('category.layout')

@section('content')

<div  class="flex justify-center mt-10">
    <h1 class="font-bold text-2xl">Categories</h1>
</div>

<div class="flex flex-wrap justify-center gap-10 mt-10">
    @foreach ($categories as $category)
    <div class="flex max-w-md overflow-hidden bg-gray-200 rounded-lg shadow-lg ">
        <div class="w-1/3 bg-cover">
            <img class="h-[171px]" src="{{ url('img/tajin.jpeg')}}" alt="">
        </div>
    
        <div class="w-2/3 p-4 md:p-4">
            <h1 class="text-xl font-bold text-orange-400 ">{{ $category->name}}</h1>
    
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-500">{{ $category->description}}</p>
    
            <div class="flex mt-2 item-center">
                <svg class="w-5 h-5 text-orange-300 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
    
                <svg class="w-5 h-5 text-orange-300 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
    
                <svg class="w-5 h-5 text-orange-300 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
    
                <svg class="w-5 h-5 text-orange-300 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>  
    
                <svg class="w-5 h-5 text-gray-500 fill-current" viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                </svg>
            </div>
    
            <div class="flex justify-between mt-3 item-center">
                <h1 class="font-medium  dark:text-gray-800 ">{{ $category->created_at}}</h1>
                <button class="px-2 py-1 text-xs font-bold text-white  transition-colors duration-300 transform bg-orange-400 rounded  hover:bg-orange-500  focus:bg-gray-700 dark:focus:bg-gray-600">Détails</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endSection