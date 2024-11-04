<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\HomeAndAbout\HomeController;
use App\Http\Controllers\HomeAndAbout\WorkController;
use App\Http\Controllers\HomeAndAbout\SkillController;
use App\Http\Controllers\HomeAndAbout\EducationController;

// Route::get('/', function () {
//     return view('welcome');
// });

//HomePage
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/dashboard', [HomePageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function (){

// });

Route::middleware(['auth', 'verified'])->group(function () {

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

    //Education
    Route::controller(EducationController::class)->group(function () {
        Route::get('/education', 'index')->name('education.index');
        Route::post('/education', 'store')->name('education.store');
        Route::put('/education/{education}', 'update')->name('education.update');
        Route::delete('/education/{education}', 'destroy')->name('education.destroy');
    });

    //Portfolio
    Route::controller(PortfolioController::class)->group(function () {
        Route::get('/portfolio', 'index')->name('portfolio.index');
        Route::post('/portfolio', 'store')->name('portfolio.store');
        Route::put('/portfolio/{portfolio}', 'update')->name('portfolio.update');
        Route::delete('/portfolio/{portfolio}', 'destroy')->name('portfolio.destroy');
    });

    //Services
    Route::controller(ServicesController::class)->group(function () {
        Route::get('/service', 'index')->name('service.index');
        Route::post('/service', 'store')->name('service.store');
        Route::put('/service/{service}', 'update')->name('service.update');
        Route::delete('/service/{service}', 'destroy')->name('service.destroy');
    });

    //Contacts
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact.index');
        Route::post('/contact', 'store')->name('contact.store');
        Route::put('/contact/{contact}', 'update')->name('contact.update');
        Route::delete('/contact/{contact}', 'destroy')->name('contact.destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
