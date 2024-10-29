<?php

use App\Http\Controllers\HomeAndAboutController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//HomePage
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/dashboard', [HomePageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //Home and About (Route Model Binding Get All Data In Model, If {id} just id)
    Route::controller(HomeAndAboutController::class)->group(function () {
        Route::get('/home', 'index')->name('home.index');
        Route::post('/home', 'store')->name('home.store');
        Route::put('/home/{home}', 'update')->name('home.update');
        Route::delete('/home/{home}', 'destroy')->name('home.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
