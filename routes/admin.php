<?php

use App\Http\Controllers\Admin\AdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| admin Routes
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
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::group(
            [
                'prefix'=>'admin',
                'as'=>'admin.',
                'controller'=>AuthAdminController::class,

            ],
            function(){
                 Route::get('/login','adminLoginForm')->name('loginForm')->middleware('Is_Admin');
                 Route::post('/login','adminLogin')->name('login')->middleware('Is_Admin');
                 Route::get('/logot','adminLogout')->name('logout');


            }
        );


        Route::group(
            [
                'prefix'=>'admin',
                'as' => 'admin.',
                'controller'=>HomeController::class,
                'middleware'=>"auth:admin"

            ],

            function(){
                Route::get('/','index')->name('index');

                Route::group(
                    [
                        'prefix'=>'categories',
                        'as' => 'category.',
                        'controller'=>CategoryController::class,

                    ],
                    function(){
                            Route::get('','index')->name('index');
                            Route::get('create','create')->name('create');
                            Route::post('store','store')->name('store');
                            Route::get('edit/{category}','edit')->name('edit');
                            Route::put('update/{category}','update')->name('update');
                            Route::delete('delete/{category}','delete')->name('delete');
                    }
                    );

                Route::group(
                    [
                        'prefix'=>'products',
                        'as' => 'product.',
                        'controller'=>ProductController::class,

                    ],
                    function(){
                            Route::get('','index')->name('index');
                            Route::get('create','create')->name('create');
                            Route::post('store','store')->name('store');
                            Route::get('edit/{product}','edit')->name('edit');
                            Route::put('update/{product}','update')->name('update');
                            Route::delete('delete/{product}','delete')->name('delete');
                    }
                    );

                Route::group(
                    [
                        'prefix'=>'ads',
                        'as' => 'ad.',
                        'controller'=>AdController::class,

                    ],
                    function(){
                            Route::get('','index')->name('index');
                            Route::get('create','create')->name('create');
                            Route::post('store','store')->name('store');
                            Route::get('edit/{ad}','edit')->name('edit');
                            Route::put('update/{ad}','update')->name('update');
                            Route::delete('delete/{ad}','delete')->name('delete');
                    }
                    );
            }
        );

    });
