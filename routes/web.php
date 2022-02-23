<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo;
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
if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}
Route::get('/', [Todo::class, 'index']);
Route::post('/todos', [Todo::class, 'store']);
