<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TransactionHistoryController;


Route::get('/wel', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'showHome']);
Route::get('/dashboard', [MemberController::class, 'showDashboard']) 
    ->middleware(['auth', 'verified']) 
    ->name('dashboard'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/memberInfo', [MemberController::class, 'memberInfo'])->name('memberInfo.showMemberInfo');

    Route::get('/nominees/create', [NomineeController::class, 'create'])->name('nominees.create');
    Route::post('/nominees', [NomineeController::class, 'store'])->name('nominees.store');
    
    Route::get('/deposits/create', [DepositController::class, 'create'])->name('deposits.create');
    Route::post('/deposits', [DepositController::class, 'store'])->name('deposits.store');
    Route::get('/deposits/{id}', [DepositController::class, 'show'])->name('deposits.show');

    Route::get('/upload-image', [ImageUploadController::class, 'showUploadForm'])->name('image.upload');
    Route::post('/upload-image', [ImageUploadController::class, 'uploadImage'])->name('image.upload.post');



    Route::get('withdrawals/create', [WithdrawalController::class, 'create'])->name('withdrawals.create');
    Route::post('withdrawals', [WithdrawalController::class, 'store'])->name('withdrawals.store');
    Route::get('/withdrawals/{id}', [WithdrawalController::class, 'show'])->name('withdrawals.show');

    Route::get('/receipt/create', [ReceiptController::class, 'create'])->name('receipt.create');
    Route::get('/receipt/withdrawal', [ReceiptController::class, 'withdrawal'])->name('receipt.withdrawal');


    Route::get('/transaction-history', [TransactionHistoryController::class, 'fetchTransactionsByDate'])->name('transactionHistory.transactionHistory');
    Route::get('/member/transaction/history', [TransactionHistoryController::class, 'fetchTransactionsByMember'])->name('transactionHistory.memberTransactionHistory');
    Route::get('/transaction/history/monthly', [TransactionHistoryController::class, 'fetchMonthlyTransactions'])->name('transactionHistory.monthlyTransactions');
});

require __DIR__ . '/auth.php';
