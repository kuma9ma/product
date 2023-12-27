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

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Tenants(入居者)
    Route::prefix('tenants')->group(function () {
        Route::get('/', [App\Http\Controllers\TenantController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\TenantController::class, 'add']);
        Route::post('/add', [App\Http\Controllers\TenantController::class, 'add']);
        Route::post('/delete', [App\Http\Controllers\TenantController::class, 'delete']);
        Route::get('/edit/{id}', [App\Http\Controllers\TenantController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\TenantController::class, 'edit']);
    });

//Vitals(バイタル)
    Route::prefix('vitals')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\VitalController::class, 'index']);
        Route::get('/add/{id}', [App\Http\Controllers\VitalController::class, 'add']);
        Route::post('/add/{id}', [App\Http\Controllers\VitalController::class, 'add']);
        Route::get('/delete/{id}', [App\Http\Controllers\VitalController::class, 'delete']);
        Route::get('/edit/{id}', [App\Http\Controllers\VitalController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\VitalController::class, 'edit']);
    });

//Meals(食事摂取量)
    Route::prefix('meals')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\MealController::class, 'index']);
        Route::get('/add/{id}', [App\Http\Controllers\MealController::class, 'add']);
        Route::post('/add/{id}', [App\Http\Controllers\MealController::class, 'add']);
        Route::post('/delete/{id}', [App\Http\Controllers\MealController::class, 'delete']);
        Route::get('/edit/{id}', [App\Http\Controllers\MealController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\MealController::class, 'edit']);
    });

//Water(水分摂取量)
    Route::prefix('waters')->group(function () {
        Route::get('/{id}', [App\Http\Controllers\WaterController::class, 'index']);
        Route::get('/add/{id}', [App\Http\Controllers\WaterController::class, 'add']);
        Route::post('/add/{id}', [App\Http\Controllers\WaterController::class, 'add']);
        Route::get('/delete/{id}', [App\Http\Controllers\WaterController::class, 'delete']);
        Route::get('/edit/{id}', [App\Http\Controllers\WaterController::class, 'edit']);
        Route::post('/edit/{id}', [App\Http\Controllers\WaterController::class, 'edit']);
    });
});
