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

use Illuminate\Support\Facades\Route;

Route::get("/", ["uses" => "HomeController@indexAction", "as" => "home"]);

Route::get("/login", function (){
    return redirect(route("auth.sign-in", ["land-to" => "home"]));
})->name("login")->middleware("guest");


Route::group(["prefix" => "auth"], function () {
    Route::post("/sign-in", ["uses" => "Auth\LoginController@loginAction", "as" => "auth.login"])->middleware("guest");

    Route::post("/sign-up", ["uses" => "Auth\RegisterController@registerAction", "as" => "auth.register"])->middleware("guest");

    Route::get("/sign-out", ["uses" => "Auth\LoginController@logoutAction", "as" => "auth.sign-out"])->middleware("auth");
});