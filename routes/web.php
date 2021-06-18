<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatalogoController;

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


Route::resources([
	"produto" => ProdutoController::class,
	"usuario" => UsuarioController::class
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
})->name("login");

Route::post("/login", [ LoginController::class, "login" ]);
Route::get("/logoff", [ LoginController::class, "logoff" ]);

Route::get('/catalogo', [ CatalogoController::class, "catalogo" ]);
Route::post('/catalogo', [ CatalogoController::class, "catalogo" ]);