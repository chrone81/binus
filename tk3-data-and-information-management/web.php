<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Serve admin page for user with role admin
Route::get('admin', function () {
    return 'Admin Page';
})->middleware(['auth', 'admin']);


// Server manager page for user with role manager
Route::get('manager', function () {
    return 'Manager Page';
})->middleware(['auth', 'manager']);

require __DIR__.'/auth.php';
