<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [CategoryController::class ,'index']);
Route::get('/create', [RecipeController::class ,'create']);
Route::post('/create', [RecipeController::class, 'store']);
Route::get('/edit/{id}', [RecipeController::class, 'edit']);
Route::get('delete-recipe/{id}', [RecipeController::class, 'destroy']);
Route::post('update-recipe/{id}', [RecipeController::class, 'update']);
