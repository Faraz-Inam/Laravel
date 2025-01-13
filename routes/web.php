<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

// Route::get('/', [StudentsController::class, 'welcome']);
// Route::get('/form', [StudentsController::class, 'form']);


Route::controller(studentsController::class)->group(function (){
    Route::get('/', 'welcome');
    Route::get('/form', 'form');
    Route::post('/create', 'create');
    Route::get('/read', 'read');
    Route::get('/delete/{id}', 'delete')->name('delete_route');
    Route::get('/edit/{id}', 'edit')->name('edit_route');
    Route::post('/update/{id}', 'update')->name('update_route');
});
