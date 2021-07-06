<?php

use Illuminate\Support\Facades\Auth;
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



    Auth::routes();



    Route::get('/admin-panel' , [App\Http\Controllers\BackendController::class, 'Index'])->name('show.panel');
    Route::get('/admin-login' , [App\Http\Controllers\BackendController::class, 'AdminLogin'])->name('show.loginpage');
    Route::get('/admin-register' , [App\Http\Controllers\BackendController::class, 'AdminRegister'])->name('show.registerpage');


    //home Slider Route
    Route::get('/sliders' , [App\Http\Controllers\HomeHeroController::class, 'Index'])->name('show.hero');
    Route::get('/sliders-create' , [App\Http\Controllers\HomeHeroController::class, 'heroAdd'])->name('hero.add');
    Route::post('/sliders-create' , [App\Http\Controllers\HomeHeroController::class, 'heroStore'])->name('hero.store');
    Route::get('/sliders-delete/{id}' , [App\Http\Controllers\HomeHeroController::class, 'heroDelete'])->name('hero.delete');





    //Show Home Page (Front End)
    Route::get('/home' , [App\Http\Controllers\CompanyHomeController::class , 'Index'])->name('show.homepage');
