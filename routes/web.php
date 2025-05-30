<?php

use App\Filament\Resources\KinerjaSemesterResource\Pages\ViewKinerjaSemester;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\GrafikController;
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

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');

Route::get(
    '/grafik',
    [GrafikController::class, 'index']
)->name('grafik');

// Menggunakan Pages\ViewKinerjaSemester dengan nisn sebagai parameter
Route::get('/admin/kinerja-semesters/{record}', ViewKinerjaSemester::class)->name('kinerja-semesters.view');
