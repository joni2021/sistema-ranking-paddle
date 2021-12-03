<?php

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


Route::group(["middleware" => "auth"], function (){

    Route::get('/', function(){
        return view("index");
    });

    // Canchas

    Route::group(["prefix" => "courts"], function(){

        Route::get("/","CourtController@index")->name('courts.index');
        Route::get("/create","CourtController@create")->name('courts.create');
        Route::post("/store","CourtController@store")->name('courts.store');

        Route::group(["prefix" => "{id}"], function(){

            Route::get("/edit","CourtController@edit")->name('courts.edit');
            Route::put("/update","CourtController@update")->name('courts.update');
            Route::delete("/destroy","CourtController@destroy")->name('courts.destroy');
        });


    });

    // Canchas

    Route::group(["prefix" => "reservations"], function(){

        Route::get("/","ReservationController@index")->name('reservations.index');
        Route::get("/reserve","ReservationController@reserve")->name('reservations.reserve');
        Route::get("/create","ReservationController@create")->name('reservations.create');
        Route::post("/store","ReservationController@store")->name('reservations.store');

        Route::group(["prefix" => "{id}"], function(){

            Route::get("/edit","ReservationController@edit")->name('reservations.edit');
            Route::put("/update","ReservationController@update")->name('reservations.update');
            Route::delete("/destroy","ReservationController@destroy")->name('reservations.destroy');
        });

    });

    // Partidos

    Route::group(["prefix" => "matches"], function(){

        Route::get("/","MatchController@index")->name('matches.index');
        Route::get("/reserve","MatchController@reserve")->name('matches.reserve');
        Route::get("/create","MatchController@create")->name('matches.create');
        Route::post("/store","MatchController@store")->name('matches.store');

        Route::group(["prefix" => "{id}"], function(){

            Route::get("/edit","MatchController@edit")->name('matches.edit');
            Route::put("/update","MatchController@update")->name('matches.update');
            Route::delete("/destroy","MatchController@destroy")->name('matches.destroy');
        });

    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
