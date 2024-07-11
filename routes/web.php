<?php

use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    $items = [];
    if (auth()->check()){
    $items = auth()->user()->inventoryItems()->latest()->get();
    }
    return view('home', ['items' => $items]);
});

// User Related Posts
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Items Related Posts
Route::post('/create-item', [ItemsController::class, 'createItem']);
Route::get('/edit-item/{item}', [ItemsController::class, 'editItem']);
Route::put('/edit-item/{item}', [ItemsController::class, 'updatedItem']);
Route::delete('/delete-item/{item}', [ItemsController::class, 'deleteItem']);