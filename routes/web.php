<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\RegisterController;
use App\http\Controllers\ServiceController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'services', 'middleware' => ['auth']], function (){
    //admin routes
        /*Route::get('register-service', function(){
            return view('services.register-service');
        });*/
        Route::get('register-service', [RegisterController::class, 'index']);
        Route::get('services', [ServiceController::class, 'index']);

    }
  );