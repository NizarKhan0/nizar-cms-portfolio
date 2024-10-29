<?php

use App\Http\Controllers\HomeAndAbout\HomeController;
use App\Http\Controllers\HomeAndAbout\SkillController;
use App\Http\Controllers\HomeAndAbout\WorkController;
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
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home.index');
        Route::post('/home', 'store')->name('home.store');
        Route::put('/home/{home}', 'update')->name('home.update');
        Route::delete('/home/{home}', 'destroy')->name('home.destroy');
    });

    //Skills
    Route::controller(SkillController::class)->group(function () {
        Route::get('/skill', 'index')->name('skill.index');
        Route::post('/skill', 'store')->name('skill.store');
        Route::put('/skill/{skill}', 'update')->name('skill.update');
        Route::delete('/skill/{skill}', 'destroy')->name('skill.destroy');
    });

    //Works Experience
    Route::controller(WorkController::class)->group(function () {
        Route::get('/work', 'index')->name('work.index');
        Route::post('/work', 'store')->name('work.store');
        Route::put('/work/{work}', 'update')->name('work.update');
        Route::delete('/work/{work}', 'destroy')->name('work.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
