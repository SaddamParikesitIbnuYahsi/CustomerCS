<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CsController;

// Route untuk BooksController
Route::get('/customers', [BookController::class, 'index']); // GET all books
Route::get('/customer/{id}', [BookController::class, 'show']); // GET a single book
Route::post('/customer', [BookController::class, 'store']); // POST a new book
Route::put('/customer/{id}', [BookController::class, 'update']); // PUT to update a book
Route::delete('/customer/{id}', [BookController::class, 'destroy']); // DELETE a book

Route::get('/cs', [LoanController::class, 'index']); // GET all books
Route::get('/cs/{id}', [LoanController::class, 'show']); // GET a single book
Route::post('/cs', [LoanController::class, 'store']); // POST a new book
Route::put('/cs/{id}', [LoanController::class, 'update']); // PUT to update a book
Route::delete('/cs/{id}', [LoanController::class, 'destroy']); // DELETE a book

 
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 
Route::apiResource('customers', CategoryController::class);
Route::apiResource('cs', ReviewController::class);