<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageBroadcastController;
use App\Http\Controllers\UsersTelegramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

/*
 * Example of a route with a closure
 *
Route::get('/', function () {
    return view('welcome');
});
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin/dashboard');
    Route::post('dashboard/stop-bot', function () {
        exec('sudo systemctl stop nohup');
        sleep(3);
        return redirect()->route('admin/dashboard');
    })->name('admin/dashboard/stop-bot');
    Route::post('dashboard/start-bot', function () {
        exec('sudo systemctl start nohup');
        sleep(3);
        return redirect()->route('admin/dashboard');
    })->name('admin/dashboard/start-bot');

    Route::get('users', [UsersTelegramController::class, 'index'])->name('admin/users');
    Route::get('users/{id}', [UsersTelegramController::class, 'show'])->name('admin/users/{id}');

    Route::get('message', [ChatController::class, 'index'])->name('admin/message');
    Route::get('message/{id}', [ChatController::class, 'show'])->name('admin/message/{id}');
    Route::post('message/send', [ChatController::class, 'store'])->name('admin/message/send');

    Route::get('broadcast-message', [MessageBroadcastController::class, 'index'])->name('admin/broadcast-message');
    Route::post('broadcast-message/send', [MessageBroadcastController::class, 'store'])->name('admin/broadcast-message/send');
    Route::post('broadcast-message/resend', [MessageBroadcastController::class, 'resend'])->name('admin/broadcast-message/resend');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
})->name('home')->middleware('guest');
