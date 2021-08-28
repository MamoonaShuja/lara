<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::prefix('admin')->middleware(
    function ($request, $next) {
        $this->role = Auth::user()->role;
        if ($this->role != 'admin') {
            return abort(404);
        }

        return $next($request);
    }
)->namespace('Admin')->name('admin.')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
