<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    //対象のルーティングを記載
    
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

    Route::prefix('tenants')->group(function () {
        Route::get('/', [App\Http\Controllers\TenantController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\TenantController::class, 'add']);
        Route::post('/add', [App\Http\Controllers\TenantController::class, 'add']);
        Route::post('/delete', [App\Http\Controllers\TenantController::class, 'delete']);
    });
});
