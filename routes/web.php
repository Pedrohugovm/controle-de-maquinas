<?php

use App\Http\Controllers\MaquinasController;
use App\Http\Controllers\AtendimentosController;
use Illuminate\Support\Facades\Auth;
use App\Models\Maquinas;
use App\Models\Locais;
use App\Http\Controllers\LocaisController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => true]);


Route::resource('maquinas', MaquinasController::class);

Route::resource('atendimentos', AtendimentosController::class);

Route::resource('locais', LocaisController::class);
