<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VesselController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\PortagentController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\GradeController;

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

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('list-users', [UserController::class, 'showUsers'])->name('all-users');
    Route::get('all-candidates', [CandidatesController::class, 'index'])->name('candidates');
    Route::get('company', [CompanyController::class, 'index'])->name('company');
    Route::get('vessel', [VesselController::class, 'index'])->name('vessel');
    Route::get('ports', [PortController::class, 'index'])->name('ports');
    Route::get('port-agents', [PortagentController::class, 'index'])->name('portagents');
    Route::get('hospitals', [HospitalController::class, 'index'])->name('hospitals');
    Route::get('grades', [GradeController::class, 'index'])->name('grades');
    Route::get('edit-grades/{id}', [GradeController::class, 'edit'])->name('edit-grade');
    Route::get('edit-hospital/{id}', [HospitalController::class, 'edit'])->name('edit-hospital');
    Route::get('edit-company/{id}', [CompanyController::class, 'edit'])->name('edit-company');
    Route::get('add-candidate', [CandidatesController::class, 'create'])->name('add-candidate');
    Route::get('edit-candidate/{id}', [CandidatesController::class, 'edit'])->name('edit-candidate');
});
