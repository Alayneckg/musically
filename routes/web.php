<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Controller::class, 'dashboard']);
Route::get('/popular', [Controller::class, 'popularPagina']);
Route::post('/popular-banco', [Controller::class, 'popularBanco']);
Route::get('/banco', [Controller::class, 'banco']);
Route::get('/relatorio-criar', [Controller::class, 'relatorioCriar']);
Route::post('/relatorio-post', [Controller::class, 'relatorioPost']);
Route::get('/relatorios', [Controller::class, 'relatorios'])->name('relatorios');
Route::get('/sobre', [Controller::class, 'sobre']);

