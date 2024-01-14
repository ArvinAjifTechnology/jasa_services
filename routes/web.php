<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionReportController;
use \App\Http\Controllers\User\UserMotorCycleController;
use App\Http\Controllers\Transaction\PaymentSubmittedController;
use App\Http\Controllers\Transaction\ServiceSelectionController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;
use \App\Http\Controllers\Admin\TypeOfServiceController as AdminTypeOfServiceController;



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

Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);

    return redirect()->back();
})->name('locale');


Auth::routes(['verify' => TRUE]);

Route::middleware('verified')->group(function () {
    
    Route::middleware('admin')->group(function () {
        // route yang hanya bisa diakses oleh admin
        Route::resource('/admin/users', AdminUserController::class)->names('admin.users');
        Route::resource('/admin/type-of-services', AdminTypeOfServiceController::class)->names('admin.type-of-services');
        Route::post('/admin/users/{user}/reset-password', [AdminUserController::class, 'resetPassword'])->name('admin.users.reset-password');
        Route::get('/admin/transaction-report', [TransactionReportController::class, 'index'])->name('transaction-report.index');
        Route::post('/admin/transaction-report', [TransactionReportController::class, 'generateReport'])->name('transaction-report.generate');
        // Route::post('/admin/transaction-report/export/', [TransactionReportController::class, 'export'])->name('transaction-report.export');
    });
    
    Route::middleware(['user'])->group(function () {
        // route yang hanya bisa diakses oleh user
        Route::resource('/user/user-motorcycles', UserMotorcycleController::class)->names('user.user-motorcycles');
        Route::get('/user/service-selection', [ServiceSelectionController::class, 'showServiceSelection'])->name('transactions.create');
        Route::post('/user/process-service-selection', [ServiceSelectionController::class, 'processServiceSelection'])
            ->name('process-service-selection');
            Route::get('/payment-submitted/{transaction_id}', [PaymentSubmittedController::class, 'showPaymentSubmittedForm'])
            ->name('payment_submitted_form');
            Route::post('/process-payment-submitted', [PaymentSubmittedController::class, 'processPaymentSubmitted'])
            ->name('process_payment_submitted');
        });
        Route::middleware('auth')->group(function () {
            // route yang hanya bisa diakses oleh mechanic
            Route::get('/', function () {
                return redirect('/dashboard');
            });
            Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard.index');
            Route::resource('transactions', TransactionController::class)->except('create');
            Route::get('/mechanic/dashboard', 'TransactionerController@dashboard');
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
            Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.update');
    });

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
