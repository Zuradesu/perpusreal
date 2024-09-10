<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\DashController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Kategori
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/addcategory', [CategoriesController::class, 'addpage'])->name('addcategory');
    Route::post('/storecategory', [CategoriesController::class, 'store'])->name('storecategory');
    
    Route::get('/editcategory/{id}', [CategoriesController::class, 'edit'])->name('editcategory');
    Route::patch('/updatecategory/{id}', [CategoriesController::class, 'update'])->name('updatecategory');


    Route::delete('/hapuskat/{id}', [CategoriesController::class, 'destroy'])->name('hapuskat');

    //CRUD Buku
    Route::get('/books', [BooksController::class, 'index'])->name('books');

    Route::get('/addbook', [BooksController::class, 'addbook'])->name('addbook');
    Route::post('/storebook', [BooksController::class, 'storebook'])->name('storebook');

    Route::get('/editbook/{id}', [BooksController::class, 'edit'])->name('editbook');
    Route::patch('/updatebook/{id}', [BooksController::class, 'update'])->name('updatebook');

    Route::delete('/hapusbook/{id}', [BooksController::class, 'destroyB'])->name('hapusbook');

    //CRUD Peminjaman
    Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam');

    Route::get('/addpinjam', [PinjamController::class, 'addpinjam'])->name('addpinjam');
    Route::post('/storepinjam', [PinjamController::class, 'storepinjam'])->name('storepinjam');

    Route::get('/editpinjam/{id}', [PinjamController::class, 'edit'])->name('editpinjam');
    Route::patch('/updatepinjam/{id}', [PinjamController::class, 'update'])->name('updatepinjam');

    Route::delete('/hapuspinjam/{id}', [PinjamController::class, 'destroyP'])->name('hapuspinjam');

    // Index Dashboard
    Route::get('/dashboard', [DashController::class, 'index'])->name('dashboard');

    // Route::get('/dashboard', [DashController::class, 'borrowedBooks'])->name('dashboard'); // Tambahkan ini

});

require __DIR__.'/auth.php';
