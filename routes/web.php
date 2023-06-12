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
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('list-users', [UserController::class, 'showUsers'])->name('all-users');
    Route::get('all-candidates', [CandidatesController::class, 'index'])->name('candidates');

    Route::get('company', [CompanyController::class, 'index'])->name('company');
    Route::get('show-company/{id}', [CompanyController::class, 'show'])->name('show-company');
    Route::get('add-company', [CompanyController::class, 'create'])->name('add-company');
    Route::get('edit-company/{id}', [CompanyController::class, 'edit'])->name('edit-company');
    Route::post('store-company', [CompanyController::class, 'store'])->name('store-company');
    Route::post('update-company', [CompanyController::class, 'update'])->name('update-company');
    Route::get('delete-company/{id}', [CompanyController::class, 'destroy'])->name('delete-company');

    Route::get('vessel', [VesselController::class, 'index'])->name('vessel');
    Route::get('show-vessel/{id}', [VesselController::class, 'show'])->name('show-vessel');
    Route::get('add-vessel', [VesselController::class, 'create'])->name('add-vessel');
    Route::get('edit-vessel/{id}', [VesselController::class, 'edit'])->name('edit-vessel');
    Route::post('store-vessel', [VesselController::class, 'store'])->name('store-vessel');
    Route::post('update-vessel', [VesselController::class, 'update'])->name('update-vessel');
    Route::get('delete-vessel/{id}', [VesselController::class, 'destroy'])->name('delete-vessel');

    Route::get('ports', [PortController::class, 'index'])->name('ports');
    Route::get('show-port/{id}', [PortController::class, 'show'])->name('show-port');
    Route::get('add-port', [PortController::class, 'create'])->name('add-port');
    Route::get('edit-port/{id}', [PortController::class, 'edit'])->name('edit-port');
    Route::post('store-port', [PortController::class, 'store'])->name('store-port');
    Route::post('update-port', [PortController::class, 'update'])->name('update-port');
    Route::get('delete-port/{id}', [PortController::class, 'destroy'])->name('delete-port');

    Route::get('port-agents', [PortagentController::class, 'index'])->name('portagents');
    Route::get('show-agent/{id}', [PortagentController::class, 'show'])->name('show-agent');
    Route::get('add-agent', [PortagentController::class, 'create'])->name('add-agent');
    Route::get('edit-agent/{id}', [PortagentController::class, 'edit'])->name('edit-agent');
    Route::post('store-agent', [PortagentController::class, 'store'])->name('store-agent');
    Route::post('update-agent', [PortagentController::class, 'update'])->name('update-agent');
    Route::get('delete-agent/{id}', [PortagentController::class, 'destroy'])->name('delete-agent');

    Route::get('hospitals', [HospitalController::class, 'index'])->name('hospitals');
    Route::get('show-hospital/{id}', [HospitalController::class, 'show'])->name('show-hospital');
    Route::get('add-hospital', [HospitalController::class, 'create'])->name('add-hospital');
    Route::get('edit-hospital/{id}', [HospitalController::class, 'edit'])->name('edit-hospital');
    Route::post('save-hospital', [HospitalController::class, 'store'])->name('save-hospital');
    Route::post('update-hospital', [HospitalController::class, 'update'])->name('update-hospital');
    Route::get('delete-hospital/{id}', [HospitalController::class, 'destroy'])->name('delete-hospital');

    Route::get('grades', [GradeController::class, 'index'])->name('grades');
    Route::get('show-grades{id}', [GradeController::class, 'show'])->name('show-grade');
    Route::get('edit-grades/{id}', [GradeController::class, 'edit'])->name('edit-grade');
    Route::get('add-grade', [GradeController::class, 'create'])->name('add-grade');
    Route::post('store-grade', [GradeController::class, 'store'])->name('store-grade');
    Route::post('update-grade', [GradeController::class, 'update'])->name('update-grade');
    Route::get('delete-grade/{id}', [GradeController::class, 'destroy'])->name('delete-grade');
    
    Route::get('add-candidate', [CandidatesController::class, 'create'])->name('add-candidate');
    Route::get('edit-candidate/{id}', [CandidatesController::class, 'edit'])->name('edit-candidate');
    
    Route::get('bank-accounts', [BankAcController::class, 'index'])->name('bank-accounts');
    Route::get('show-bank/{id}', [BankAcController::class, 'show'])->name('show-bank');
    Route::get('edit-bank/{id}', [BankAcController::class, 'edit'])->name('edit-bank');
    Route::get('add-bank-account', [BankAcController::class, 'create'])->name('add-bank-account');
    Route::post('store-bank-ac', [BankAcController::class, 'store'])->name('store-bank-ac');
    Route::post('update-bank-ac', [BankAcController::class, 'update'])->name('update-bank-ac');
    Route::get('delete-bank/{id}', [BankAcController::class, 'destroy'])->name('delete-bank');

    Route::get('all-ranks', [RankController::class, 'index'])->name('all-ranks');
    Route::get('show-rank/{id}', [RankController::class, 'show'])->name('show-rank');
    Route::get('add-rank', [RankController::class, 'create'])->name('add-rank');
    Route::get('edit-rank/{id}', [RankController::class, 'edit'])->name('edit-rank');
    Route::post('stroe-rank', [RankController::class, 'store'])->name('store-rank');
    Route::post('update-rank', [RankController::class, 'update'])->name('update-rank');
    Route::get('delete-rank/{id}', [RankController::class, 'destroy'])->name('delete-rank');

    Route::get('discussions', [DiscussionController::class, 'index'])->name('discussions');
    Route::get('show-discussion/{id}', [DiscussionController::class, 'show'])->name('show-discussion');
    Route::get('add-discussion', [DiscussionController::class, 'create'])->name('add-discussion');
    Route::get('edit-discussion/{id}', [DiscussionController::class, 'edit'])->name('edit-discussion');

    Route::get('birthdays', [HomeController::class, 'birthdays'])->name('birthdays');
    Route::post('search-candidate', [HomeController::class, 'searchCandidate'])->name('search-candidate');
    Route::get('show-candidate/{id}', [HomeController::class, 'show'])->name('show-candidate');
});
