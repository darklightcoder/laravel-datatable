<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('dashboard', function () {
    $users = User::all();
    return view('dashboard', compact('users'));
});

Route::get('list', [UserController::class, 'dataTableLogic']);

// Show Edit Form
Route::get('/editUser/{user}', [UserController::class, 'edit']);

// Update Listing
Route::put('/updateUser/{user}', [UserController::class, 'update']);

// Delete Listing
Route::delete('/deleteUser/{user}', [UserController::class, 'destroy']);



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', function () {
    $users = User::all();
    return view('dashboard', compact('users'));
});


