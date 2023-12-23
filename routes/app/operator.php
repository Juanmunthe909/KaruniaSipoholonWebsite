<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Operator\OrderController;
use App\Http\Controllers\Operator\HotelController;
use App\Http\Controllers\Operator\DashboardController;
use App\Http\Controllers\Operator\BookingController;
use App\Http\Controllers\Operator\NotificationController;


Route::prefix('operator/')->name('operator.')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('login', [AuthController::class, 'do_login'])->name('login');
    });
    Route::middleware('can:Operator')->group(function () {
        Route::redirect('/', 'dashboard', 301);
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');

        Route::resource('booking', BookingController::class)->only(['create']);
        Route::resource('hotel', HotelController::class)->only(['create']);
        Route::resource('order', OrderController::class)->only(['create']);


        Route::get('hotel', [HotelController::class, 'index'])->name('hotel.index');
        Route::post('hotel/makePenginapan', [HotelController::class, 'makePenginapan'])->name('hotel.makePenginapan');
        Route::get('hotel/pdf', [HotelController::class, 'pdf'])->name('hotel.pdf');
        Route::get('hotel/{hotel}', [HotelController::class, 'show'])->name('hotel.show');
        Route::patch('hotel/accept/{penginapan}', [HotelController::class, 'accept'])->name('hotel.accept');
        Route::patch('hotel/reject/{penginapan}', [HotelController::class, 'reject'])->name('hotel.reject');
        Route::put('hotel/finish/{penginapan}', [HotelController::class, 'finish'])->name('hotel.finish');
        Route::delete('hotel/destroy/{penginapan}', [HotelController::class, 'destroy'])->name('hotel.destroy');

        Route::get('order', [OrderController::class, 'index'])->name('order.index');
        Route::post('order/makeOrder', [OrderController::class, 'makeOrder'])->name('order.makeOrder');
        Route::get('order/pdf', [OrderController::class, 'pdf'])->name('order.pdf');
        Route::get('order/{pemesanan}', [OrderController::class, 'show'])->name('pemesanan.show');
        Route::patch('pemesanan/accept/{pemesanan}', [OrderController::class, 'accept'])->name('pemesanan.accept');
        Route::patch('pemesanan/reject/{pemesanan}', [OrderController::class, 'reject'])->name('pemesanan.reject');
        Route::put('pemesanan/finish/{pemesanan}', [OrderController::class, 'finish'])->name('pemesanan.finish');
        Route::delete('pemesanan/destroy/{pemesanan}', [OrderController::class, 'destroy'])->name('pemesanan.destroy');

        Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
        Route::post('booking/makeBooking', [BookingController::class, 'makebooking'])->name('booking.makeBooking');
        // Route::get('booking/{booking}', [BookingController::class, 'show'])->name('booking.show');
        Route::get('booking/pdf', [BookingController::class, 'pdf'])->name('booking.pdf');
        Route::patch('pemandian/accept/{pemandian}', [BookingController::class, 'accept'])->name('pemandian.accept');
        Route::patch('pemandian/reject/{pemandian}', [BookingController::class, 'reject'])->name('pemandian.reject');
        Route::delete('pemandian/destroy/{pemandian}', [BookingController::class, 'destroy'])->name('pemandian.destroy');
        Route::put('pemandian/finish/{pemandian}', [BookingController::class, 'finish'])->name('pemandian.finish');


        Route::get('counter', [NotificationController::class, 'counter'])->name('counter_notif');
        Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
    });
});
