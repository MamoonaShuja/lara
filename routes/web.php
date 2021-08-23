<?php

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
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
