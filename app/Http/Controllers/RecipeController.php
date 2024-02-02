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
    public function index(Request $request)
    {
        $recipes = Recipe::all();
        $categories = Category::all();
    
        return view('recipe.index', compact('recipes', 'categories'));
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

        $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');

        $imageName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/image', $imageName);

        // You can use $imageName wherever you need it, for example, storing in the database.
    }
        $recipe = Recipe::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'image' => $imagePath,
            'category_id' => $request->input('categoryId'),
        ]);

        return redirect('create')->with('success', 'Recipe created successfully');

    }
    public function search(Request $request)
{
    $results = $request->input('results');

    $recipes = Recipe::where('name', 'like', "%$results%")
        ->orWhere('description', 'like', "%$results%")
        ->orWhere('ingredients', 'like', "%$results%")
        ->orWhereHas('category', function ($query) use ($results) {
            $query->where('name', 'like', "%$results%");
        })
        ->get();

    $categories = Category::all();

    return view('recipe.search', compact('recipes', 'results', 'categories'));
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
    public function edit($id)
    {
        $categories = Category::all();
        $recipe = Recipe::find($id);
        return view('recipe.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->image_path = $request->input('image_path');
        $recipe->category_id = $request->input('categoryId');
        $recipe->update();
        return redirect('create')->with('status', 'recipe updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->back()->with('success','Successfully deleted');

    }
}
