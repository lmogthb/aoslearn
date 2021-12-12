<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\SolicitudController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::name('index')->get('/', [App\Http\Controllers\RecursoController::class, 'index']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::name('active')->put('/solicitud/{id}/active', [App\Http\Controllers\SolicitudController::class, 'activeSolicitud']);
    Route::name('adminActuales')->get('/admin/actuales', [App\Http\Controllers\AdminController::class, 'getAdminRecActual']);
});

Route::resource('recurso', RecursoController::class)->parameters(['recurso' => 'id']);
Route::resource('categoria', CategoriaController::class);
Route::resource('solicitud', SolicitudController::class);
Route::resource('admin', AdminController::class);



/* 
Route::name('categoria')->get('/categoria/{id}', [App\Http\Controllers\CategoriasController::class, 'getCategoria']);

Route::middleware(['auth'])->group(function () {
    Route::name('solicitar')->get('/solicitudes', [App\Http\Controllers\SolicitudesController::class, 'getSolicitar']);
    Route::name('solicitarPost')->post('/solicitudes', [App\Http\Controllers\SolicitudesController::class, 'postSolicitud']);
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::name('adminView')->get('/admin', [App\Http\Controllers\AdminController::class, 'getAdminPanel']);
    Route::delete('/admin/solicitudes/delete/{id}', [App\Http\Controllers\SolicitudesController::class, 'deleteSolicitud']);
    Route::put('/admin/solicitudes/active/{id}', [App\Http\Controllers\SolicitudesController::class, 'activeSolicitud']);
    Route::name('adminActuales')->get('/admin/actuales', [App\Http\Controllers\AdminController::class, 'getAdminRecActual']);
    Route::get('/admin/actuales/edit/{id}', [App\Http\Controllers\AdminController::class, 'getEdit']);
    Route::put('/admin/actuales/edit/{id}', [App\Http\Controllers\AdminController::class, 'putEdit']);
    Route::delete('/admin/actuales/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteActual']);
    Route::get('/admin/add/categoria/', [App\Http\Controllers\AdminController::class, 'getCategoria']);
    Route::post('/admin/add/categoria/', [App\Http\Controllers\AdminController::class, 'addCategoria']);
}); */


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */

