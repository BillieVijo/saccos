<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\AuditTrailController;
use App\Http\Controllers\ReportController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/role', RoleController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/member', MemberController::class);
    Route::resource('/loan', LoanController::class);
    // Additional routes for specific loan
    Route::get('loans/requested', [LoanController::class, 'showRequested'])->name('loan.requested');
    Route::get('loans/my-loans', [LoanController::class, 'showMyLoans'])->name('loan.myLoans');
    Route::resource('/deposit', DepositController::class);
    // Additional routes for specific deposits
    Route::get('deposits/made', [DepositController::class, 'showDepositMade'])->name('deposit.made');
    Route::get('deposits/my-deposits', [DepositController::class, 'showMyDeposits'])->name('deposit.myDeposits');
    Route::resource('/share', ShareController::class);
    // Additional routes for specific shares
    Route::get('shares/made', [ShareController::class, 'showShareMade'])->name('share.made');
    Route::get('shares/my-shares', [ShareController::class, 'showMyShares'])->name('share.myShares');
    Route::resource('/log', AuditTrailController::class);

    // report routes
    Route::get('/contribution-report', [ReportController::class,'contributionReport'])->name('contribution.report');
    Route::get('/loan-report', [ReportController::class,'loanReport'])->name('loan.report');

    Route::get('/deposit/export/file', [ReportController::class, 'exportDeposit'])->name('deposit.export');
    Route::get('/loan/export/file', [ReportController::class, 'exportLoan'])->name('loan.export');
});

require __DIR__.'/auth.php';
