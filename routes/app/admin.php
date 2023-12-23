<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\KasController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ToiletController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PendapatanController;
use App\Http\Controllers\Admin\KritikSaranController;
use App\Http\Controllers\Admin\PengeluaranController;

Route::group(['domain' => ''], function () {
    Route::prefix('admin/')->name('admin.')->group(function () {
        Route::middleware('can:Admin')->group(function () {
            Route::redirect('/', 'dashboard', 301);
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            // Route::resource('product', ProductController::class);
            Route::resource('food', FoodController::class);
            Route::resource('toilet', ToiletController::class);
            Route::resource('hotel', HotelController::class);

            Route::get('kas', [KasController::class, 'index'])->name('kas.index');
            Route::get('kas/filter', [KasController::class, 'filter'])->name('kas.filter');
            Route::get('pendapatan', [PendapatanController::class, 'index'])->name('pendapatan.index');
            Route::get('pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
            Route::get('kas/pdf', [KasController::class, 'pdf'])->name('kas.pdf');
            Route::delete('kas/destroy/{kas}', [KasController::class, 'destroy'])->name('kas.destroy');
            Route::post('kas/store', [KasController::class, 'store'])->name('kas.store');

            Route::get('pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
            Route::get('pengeluaran/pdf', [PengeluaranController::class, 'pdf'])->name('pengeluaran.pdf');
            Route::get('pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
            Route::delete('pengeluaran/destroy/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
            Route::get('pendapatan/pdf', [PendapatanController::class, 'pdf'])->name('pendapatan.pdf');
            Route::delete('pendapatan/destroy/{pendapatan}', [PendapatanController::class, 'destroy'])->name('pendapatan.destroy');
            Route::get('pendapatan/filter', [PendapatanController::class, 'filter'])->name('pendapatan.filter');
            Route::get('pengeluaran/filter', [PengeluaranController::class, 'filter'])->name('pengeluaran.filter');




            // Route::get('order/pdf', [OrderController::class, 'pdf'])->name('order.pdf');
            Route::get('order', [OrderController::class, 'index'])->name('order.index');
            Route::get('order/pdf', [OrderController::class, 'pdf'])->name('order.pdf');
            Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
            // Route::patch('order/accept/{order}', [OrderController::class, 'accept'])->name('order.accept');
            // Route::patch('order/reject/{order}', [OrderController::class, 'reject'])->name('order.reject');
            Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
            Route::get('kritik-saran', [KritikSaranController::class, 'index'])->name('kritik');
            Route::delete('kritik-saran/{kritik_saran}', [KritikSaranController::class, 'destroy'])->name('kritik.destroy');
        });
    });
});
