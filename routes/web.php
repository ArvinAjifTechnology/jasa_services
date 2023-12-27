<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController as AdminUserController;
use \App\Http\Controllers\Admin\TypeOfServiceController as AdminTypeOfServiceController;
use \App\Http\Controllers\User\UserMotorCycleController;

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

Route::get('/', function () {
    return view('layouts.main');
});

Auth::routes(['verify' => TRUE]);

Route::middleware('verified')->group(function () {

    Route::middleware('admin')->group(function () {
        // route yang hanya bisa diakses oleh admin
        Route::resource('/admin/users', AdminUserController::class)->names('admin.users');
        Route::resource('/admin/type-of-services', AdminTypeOfServiceController::class)->names('admin.type-of-services');

        // Route::resource('/admin/rooms', RoomController::class);
        // Route::resource('/admin/items', ItemController::class);
        // Route::resource('/admin/borrows', BorrowController::class);
        // Route::get('/admin/borrows/{borrow_code}/submit-borrow-request', [BorrowController::class, 'submitBorrowRequest']);
        // Route::put('/admin/borrows/{borrow_code}/verify-submit-borrow-request', [BorrowController::class, 'verifySubmitBorrowRequest']);
        // Route::put('/admin/borrows/{id}/return', [BorrowController::class, 'returnBorrow'])->name('borrows.return');
        // Route::put('/admin/borrows/{id}/reject-borrow-request', [BorrowController::class, 'rejectBorrowRequest'])->name('borrows.return');
        // Route::post('/admin/users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('admin.users.reset-password');
        // Route::get('/borrow-report', [BorrowReportController::class, 'index'])->name('borrow-report.index');
        // Route::post('/borrow-report', [BorrowReportController::class, 'generateReport'])->name('borrow-report.generate');
        // Route::post('/borrow-report/export/', [BorrowReportController::class, 'export'])->name('borrow-report.export');
    });

    Route::middleware(['user'])->group(function () {
        // route yang hanya bisa diakses oleh user
        Route::resource('/user/user-motorcycles', UserMotorcycleController::class)->names('user.user-motorcycles');
        // Route::resource('/user/rooms', RoomController::class)->only(['index', 'show']);
        // Route::resource('/user/items', ItemController::class);
        // Route::resource('/user/borrows', BorrowController::class);
        // Route::get('/user/borrows/{borrow_code}/submit-borrow-request', [BorrowController::class, 'submitBorrowRequest']);
        // Route::put('/user/borrows/{borrow_code}/verify-submit-borrow-request', [BorrowController::class, 'verifySubmitBorrowRequest']);
        // Route::put('/user/borrows/{id}/return', [BorrowController::class, 'returnBorrow'])->name('borrows.return');
    });

    Route::middleware('mechanic')->group(function () {
        // route yang hanya bisa diakses oleh mechanic
        // Route::get('/mechanic/dashboard', 'BorrowerController@dashboard');
        // Route::resource('/mechanic/borrows', BorrowerBorrowController::class);
        // Route::get('/mechanic/borrows/create/search-item', [BorrowerBorrowController::class, 'searchItemView']);
        // Route::post('/mechanic/borrows/create/search-item', [BorrowerBorrowController::class, 'searchItem'])->name('mechanic.borrow.search-item');
        // Route::get('/mechanic/borrows/create/{item_code}/submit-borrow-request', [BorrowerBorrowController::class, 'submitBorrowRequestView']);
        // Route::get('/mechanic/borrows/create/submit-borrow-request-two', [BorrowerBorrowController::class, 'submitBorrowRequestViewTwo']);
        // Route::post('/mechanic/borrows/create/submit-borrow-request-two', [BorrowerBorrowController::class, 'submitBorrowRequestViewTwo']);
        // Route::post('/mechanic/borrows/create/submit-borrow-request-page-two', [BorrowerBorrowController::class, 'submitBorrowRequestViewTwo']);
        // Route::post('/mechanic/borrows/create/submit-borrow-request-verifiy/', [BorrowerBorrowController::class, 'verifySubmitBorrowRequestView']);
        // Route::get('/mechanic/borrows/create/submit-borrow-request-verifiy/', [BorrowerBorrowController::class, 'verifySubmitBorrowRequestView']);
    });

    Route::middleware('auth')->group(function () {
        // route yang hanya bisa diakses oleh mechanic
        // Route::get('/mechanic/dashboard', 'BorrowerController@dashboard');
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        // Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        // Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('password.change');
        // Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.update');
    });

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
