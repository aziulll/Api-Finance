<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\RegistrerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




    Route::prefix('receita')->group(function() {
        Route::post('/criar-receita', [ReceitaController::class, 'store'])->name('criar-receita.store');
        Route::get('/receita/{id}', [ReceitaController::class, 'show'])->name('receita.show');
        Route::resource('receita', ReceitaController::class);
        
        Route::get('/total-receitas', [ReceitaController::class, 'sum'])->name('total-receitas');
        Route::get('/pesquisar', [ReceitaController::class, 'search']);
        Route::put('/editar-receita/{id}', [ReceitaController::class, 'update']);
    });
    
    
    Route::prefix('despesa')->group(function () {
        Route::resource('despesa', DespesaController::class);
        Route::get('/total-despesas', [DespesaController::class, 'sum'])->name('total-despesas');
        Route::post('/criar-despesa', [DespesaController::class, 'store'])->name('criar-receita.store');
        Route::get('/pesquisar', [DespesaController::class, 'search'])->name('pesquisar');
    });
    
    Route::prefix('usuarios')->group(function () {
        Route::get('/total-usuarios', [UserController::class, 'getCountOfUsers'])->name('total-usuarios');
        Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/novo-usuario', [RegistrerController::class,'store'])->name('novo.store');
        Route::get('/usuarios', [UserController::class, 'index']);
    });
    
    
    
    
   



// Route::group(['prefix' => 'receitas'], function () {
//     Route::post('/criar-receita', [ReceitaController::class, 'store'])->name('criar-receita.store');
//     Route::get('/receita/{id}', [ReceitaController::class, 'show'])->name('receita.show');
//     Route::resource('receita', ReceitaController::class);
//     Route::get('/total-receitas', [ReceitaController::class, 'sum'])->name('total-receitas');
//     Route::get('/pesquisar', [ReceitaController::class, 'search']);
//     Route::put('/editar-receita/{id}', [ReceitaController::class, 'update']);
// });


// Route::prefix('despesa')->group(function () {
//     Route::resource('despesa', DespesaController::class);
//     Route::get('/total-despesas', [DespesaController::class, 'sum'])->name('total-despesas');
//     Route::post('/criar-despesa', [DespesaController::class, 'store'])->name('criar-receita.store');
//     Route::get('/pesquisar', [DespesaController::class, 'search'])->name('pesquisar');
// });

// Route::prefix('usuarios')->group(function () {
//     Route::get('/total-usuarios', [UserController::class, 'getCountOfUsers'])->name('total-usuarios');
//     Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
//     Route::post('/novo-usuario', [RegistrerController::class,'store'])->name('novo.store');
// });


    Route::post('login', [AuthController::class,'auth'])->name('login');
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
