<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\MediaPartnerController;
use App\Http\Controllers\Admin\LoginController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/beli-tiket', [TicketController::class, 'form'])->name('ticket.form');
Route::post('/beli-tiket', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/tiket/sukses/{orderCode}', [TicketController::class, 'success'])->name('ticket.success');
Route::get('/tiket/check-status/{orderCode}', [TicketController::class, 'checkStatus'])->name('ticket.checkStatus');

// Admin Auth Routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Protected Admin Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('admin.orders.index');
    })->name('admin.dashboard');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/export', [OrderController::class, 'exportExcel'])->name('admin.orders.export');
    Route::post('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    Route::resource('admin/speakers', SpeakerController::class)->names([
        'index' => 'admin.speakers.index',
        'create' => 'admin.speakers.create',
        'store' => 'admin.speakers.store',
        'edit' => 'admin.speakers.edit',
        'update' => 'admin.speakers.update',
        'destroy' => 'admin.speakers.destroy',
    ]);

    Route::resource('admin/sponsors', SponsorController::class)->names([
        'index' => 'admin.sponsors.index',
        'create' => 'admin.sponsors.create',
        'store' => 'admin.sponsors.store',
        'edit' => 'admin.sponsors.edit',
        'update' => 'admin.sponsors.update',
        'destroy' => 'admin.sponsors.destroy',
    ]);

    Route::resource('admin/media-partners', MediaPartnerController::class)->names([
        'index' => 'admin.media-partners.index',
        'create' => 'admin.media-partners.create',
        'store' => 'admin.media-partners.store',
        'edit' => 'admin.media-partners.edit',
        'update' => 'admin.media-partners.update',
        'destroy' => 'admin.media-partners.destroy',
    ]);
});

Route::get('/tiket/{ticketCode}', [TicketController::class, 'showTicket'])->name('ticket.show');
Route::get('/verify-ticket/{ticketCode}', [TicketController::class, 'verify'])->name('ticket.verify');
Route::post('/check-in-ticket/{ticketCode}', [TicketController::class, 'checkIn'])->name('ticket.checkIn');

Route::post('/midtrans/callback', [TicketController::class, 'callback'])->name('midtrans.callback');