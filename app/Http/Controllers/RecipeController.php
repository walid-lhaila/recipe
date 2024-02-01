<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $recipes = Recipe::all();

        // Pass the categories to the view
        return view('recipe.create', compact('categories','recipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }
        $recipe = Recipe::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'image_path' => $imagePath,
            'category_id' => $request->input('categoryId'),
        ]);

        return redirect('index')->with('success', 'Recipe created successfully');

        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'ingredients' => 'required',
        //     'category_id' => 'required',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif',

        // ]);






    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
