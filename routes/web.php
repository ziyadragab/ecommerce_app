<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndUser\AuthController;
use App\Http\Controllers\EndUser\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
Route::group(

    [
        'prefix' => LaravelLocalization::setLocale(),

    ], function(){

             Route::get('/',[HomeController::class,'index'])->name('index');

                   /*
                  *Auth Routts*

                  */
Route::group(
    [
         'controller'=>AuthController::class
    ],
        function(){

               Route::get('/register','registerForm')->name('registerForm')->middleware('guest');
               Route::post('/register','register')->name('register')->middleware('guest');
               Route::get('/login','loginForm')->name('loginForm')->middleware('guest');
               Route::post('/login','login')->name('login')->middleware('guest');
               Route::get('/logout','logout')->name('logout');

           });

    });
