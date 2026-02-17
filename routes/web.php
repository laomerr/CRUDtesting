<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

Route::get('/home', function () {
    return view('home');
})->name('home.index');

Route::get('/cadastrar', [EmpresaController::class, 'create'])->name('cadastro.create');
Route::post('/cadastrar', [EmpresaController::class, 'store'])->name('cadastro.store');
Route::get('/pesquisar', [App\Http\Controllers\EmpresaController::class, 'index'])->name('pesquisar');
Route::get('/empresas/editar/{id}', [EmpresaController::class, 'edit'])->name('editar.edit');
Route::put('/empresas/atualizar/{id}', [EmpresaController::class, 'update'])->name('atualizar.update');
Route::delete('/excluir', [EmpresaController::class, 'destroy'])->name('excluir.destroy');
