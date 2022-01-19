<?php

use App\Http\Controllers\CatController;
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
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/cat/create', [CatController::class, 'create'])->name('create.cat');

    Route::post('/cat', [CatController::class, 'store'])->name('store.cat');

    Route::get('/cat/{id}/edit', [CatController::class, 'show'])->name('edit.cat');

    Route::put('/cat/{id}', [CatController::class, 'update'])->name('update.cat');

    Route::get('/map', [CatController::class, 'map'])->name('map.cat');

});
