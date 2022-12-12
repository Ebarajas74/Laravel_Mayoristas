<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MayoristaController;
use App\Http\Controllers\StateController;

Route::get('/', function () {
    return redirect()->route("home");
});
// Route::get("/acerca-de", function () {
//     return view("misc.acerca_de");
// })->name("acerca_de");


Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");

Route::middleware(['auth','admin'])->group(function (){
    Route::get('/mayorista', 'App\Http\Controllers\MayoristaController@index')->name('mayorista.index');
    Route::get('/mayorista/create', [MayoristaController::class, 'create'])->name('mayorista.create');
    Route::post('/mayorista', [MayoristaController::class, 'store'])->name('mayorista.store');

    Route::get('/state/{codpos}', 'App\Http\Controllers\Api\StateController@states')->name('codpostal');
    Route::get('/city/{codstate}', 'App\Http\Controllers\Api\StateController@citys')->name('codstate');
    Route::get('/colonia/{codpos}', 'App\Http\Controllers\Api\StateController@colonias')->name('colonia');
});
