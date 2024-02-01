    @extends('recipe.layout')

    @section('content')

    <div class=" flex justify-end">
            <button id="btn" class=" mt-5 mr-5 bg-orange-400 border border-transparent rounded-md py-2 px-4 text-base font-medium text-white hover:bg-orange-500">Add Recipe</button>
    </div>

    <div id="form" class="absolute w-full h-full inset-0 bg-opacity-50 backdrop-filter backdrop-blur-md flex justify-center items-center bg-orange-300 scale-0 duration-300">
        <div class="bg-orange-400 w-[560px] ml-[20px]">
            <form action="/create" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-orange-400 py-10">
                @csrf <!-- Add this to include the CSRF token -->

                <div class="flex justify-end">
                    <svg id="closeForm" class="w-6 h-6 text-white dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m13 7-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>

                <div class="flex justify-center">
                    <h1 class="text-white font-bold text-2xl">Add Recipe</h1>
                </div>

                <div class="relative z-0 w-full mt-5 mb-5 group">
                    <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                    <label for="description" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="ingredients" id="ingredients" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-white dark:focus:border-orange-500 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                    <label for="ingredients	" class="peer-focus:font-medium absolute text-sm text-white duration-300 transform -translate-y-2 scale-75 top-2 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-white font-bold peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ingredients	</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <label class="block mb-2 text-sm font-bold text-white" for="image">Upload file</label>
                    <input name="image" class="bg-transparent border-0 border-b-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-white dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-describedby="user_avatar_help" type="file">
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="categoryId" class="block mb-2 text-sm font-bold text-white">Select Category</label>
                        <select id="categoryId" name="categoryId" class="bg-transparent border-0 border-b-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-white dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="flex justify-center">
                    <button type="submit" class="text-black bg-gray-200 hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>

                                                                <!--card-->
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



<script src="{{ url('js/form.js')}}"></script>

    
    @endSection
    