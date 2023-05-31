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
use App\Http\Controllers\BankAcController;
use App\Http\Controllers\RankController;

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
    Route::get('add-company', [CompanyController::class, 'create'])->name('add-company');
    Route::get('vessel', [VesselController::class, 'index'])->name('vessel');
    Route::get('ports', [PortController::class, 'index'])->name('ports');
    Route::get('add-port', [PortController::class, 'create'])->name('add-port');
    Route::get('edit-port/{id}', [PortController::class, 'edit'])->name('edit-port');
    Route::get('port-agents', [PortagentController::class, 'index'])->name('portagents');
    Route::get('add-agent', [PortagentController::class, 'create'])->name('add-agent');
    Route::get('edit-agent/{id}', [PortagentController::class, 'edit'])->name('edit-agent');
    Route::get('hospitals', [HospitalController::class, 'index'])->name('hospitals');
    Route::get('add-hospital', [HospitalController::class, 'create'])->name('add-hospital');
    Route::get('grades', [GradeController::class, 'index'])->name('grades');
    Route::get('edit-grades/{id}', [GradeController::class, 'edit'])->name('edit-grade');
    Route::get('edit-hospital/{id}', [HospitalController::class, 'edit'])->name('edit-hospital');
    Route::get('edit-company/{id}', [CompanyController::class, 'edit'])->name('edit-company');
    Route::get('add-candidate', [CandidatesController::class, 'create'])->name('add-candidate');
    Route::get('edit-candidate/{id}', [CandidatesController::class, 'edit'])->name('edit-candidate');
    Route::get('add-vessel', [VesselController::class, 'create'])->name('add-vessel');
    Route::get('edit-vessel/{id}', [VesselController::class, 'edit'])->name('edit-vessel');
    Route::get('bank-accounts', [BankAcController::class, 'index'])->name('bank-accounts');
    Route::get('edit-bank/{id}', [BankAcController::class, 'edit'])->name('edit-bank');
    Route::get('add-bank-account', [BankAcController::class, 'create'])->name('add-bank-account');
    Route::get('all-ranks', [RankController::class, 'index'])->name('all-ranks');
    Route::get('add-rank', [RankController::class, 'create'])->name('add-rank');
    Route::get('edit-rank/{id}', [RankController::class, 'edit'])->name('edit-rank');
});
