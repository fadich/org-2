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

Route::get("/login", function () {
    return redirect("/#sign-in");
})->name("login")->middleware("guest");


Route::group(["prefix" => "auth"], function () {
    Route::any("/", ["uses" => "Auth\LoginController@indexAction", "as" => "auth.index"]);

    Route::post("/sign-in", ["uses" => "Auth\LoginController@loginAction", "as" => "auth.login"])
        ->middleware("guest");

    Route::post("/sign-up", ["uses" => "Auth\RegisterController@registerAction", "as" => "auth.register"])
        ->middleware("guest");

    Route::get("/sign-out", ["uses" => "Auth\LoginController@logoutAction", "as" => "auth.sign-out"])
        ->middleware("auth");
});

Route::group(["prefix" => "todo"], function () {
    Route::get("/", ["uses" => "Todo\TodoController@indexAction", "as" => "todo.all"])
        ->middleware("ajax")->middleware("cors");

    Route::put("/item", ["uses" => "Todo\TodoController@itemAction", "as" => "todo.item.create"])
        ->middleware("ajax")->middleware("cors");

    Route::put("/item/{id}", ["uses" => "Todo\TodoController@itemAction", "as" => "todo.item.update"])
        ->middleware("ajax")->middleware("cors");

    Route::delete("/item/{id}", ["uses" => "Todo\TodoController@deleteAction", "as" => "todo.item.delete"])
        ->middleware("ajax")->middleware("cors");
});

Route::group(["prefix" => "storage"], function () {
    Route::get("/", ["uses" => "Storage\StorageController@readAction", "as" => "storage.read"])
        ->middleware("ajax")->middleware("cors");
    Route::post("/", ["uses" => "Storage\StorageController@writeAction", "as" => "storage.write"])
        ->middleware("ajax")->middleware("cors");
});
