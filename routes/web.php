<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\PicturesController;
use App\Http\Controllers\ProgramsController;

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
//     return Inertia::render('ReservationApp', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('ReservationApp', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/', [FacilitiesController::class, 'index'])->name('index');

Route::get('/{page}', [FacilitiesController::class, 'pages'])->name('page.pages');

Route::get('/objekat/{id}', [FacilitiesController::class, 'show'])->name('objekat/{id}.show');

Route::post('/rezervacije', [ReservationsController::class, 'store'])->name('rezervacije.store');

Route::post('/dodaj', [FacilitiesController::class, 'store'])->name('dodaj.store');

Route::post('/dodaj-dogadjaj', [ProgramsController::class, 'store'])->name('dodaj-dogadjaj.store');

Route::get('/izmeni/{id}', [FacilitiesController::class, 'edit'])->name('izmeni.edit');

Route::post('/izmeni', [FacilitiesController::class, 'update'])->name('izmeni.update');

Route::get('/izmeni-galeriju/{id}', [PicturesController::class, 'edit'])->name('izmeni-galeriju/{id}.edit');

Route::post('/izmeni-galeriju', [PicturesController::class, 'update_gallery'])->name('izmeni-galeriju.update_gallery');

Route::post('/dodaj-sliku', [PicturesController::class, 'store'])->name('dodaj-sliku.store');

Route::delete('/izbrisi-sliku/{id}', [PicturesController::class, 'destroy'])->name('izbrisi-sliku.destroy');

Route::delete('/izbrisi/{id}', [FacilitiesController::class, 'destroy'])->name('izbrisi.destroy');

