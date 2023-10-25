<?php

use App\Models\Lote;
use App\Models\Vacina;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\VacinaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $lotes = [];

    if(auth()->check()){
        $lotes = Lote::where('user_id', auth()->user()->id)->get();
    }

    return view('home', ['lotes' => $lotes]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//Controle de lotes
Route::post('/lote', [LoteController::class, 'newLote']);
Route::post('/lote-edit/{id}', [LoteController::class, 'editLote']);
Route::put('/lote-edit/{id}', [LoteController::class, 'updateLote']);
Route::post('/lote-sell/{id}', [LoteController::class, 'sellLote']);
Route::put('/lote-sell/{id}', [LoteController::class, 'sell_lote']);

//lotes vendidos
Route::get('/vendidos', function () {
    $lotes = [];

    if(auth()->check()){
        $lotes = Lote::where('user_id', auth()->user()->id)->get();
    }

    return view('vendidos', ['lotes' => $lotes]);
});