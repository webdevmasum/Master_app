<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Backend\Product\CategoryController;
use App\Http\Controllers\Web\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/redirect', [HomeController::class, 'redirect']);

// These routes are for frontend Pages
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', function () { return view('frontend.layout.home'); })->name('home');
Route::get('/arrival', function () { return view('frontend.layout.arrival'); })->name('arrival');
Route::get('/why', function () { return view('frontend.layout.why'); })->name('why');
Route::get('/product', function () { return view('frontend.layout.product'); })->name('product');
Route::get('/subscribe', function () { return view('frontend.layout.subscribe'); })->name('subscribe');
Route::get('/client', function () { return view('frontend.layout.client'); })->name('client');




// These routes are for backend
Route::resource('categories', CategoryController::class);



require __DIR__.'/auth.php';
