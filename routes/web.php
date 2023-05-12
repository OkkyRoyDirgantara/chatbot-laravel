<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageBroadcastController;
use App\Http\Controllers\UsersTelegramController;
use App\Http\Controllers\WeathersController;
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

    Route::post('dashboard/stop-bot', [DashboardController::class, 'stopBot'])->name('admin/dashboard/stop-bot');
    Route::post('dashboard/start-bot', [DashboardController::class, 'startBot'])->name('admin/dashboard/start-bot');

    Route::post('dashboard/stop-cuaca', [DashboardController::class, 'stopServiceCuaca'])->name('admin/dashboard/stop-cuaca');
    Route::post('dashboard/start-cuaca', [DashboardController::class, 'startServiceCuaca'])->name('admin/dashboard/start-cuaca');

    Route::get('users', [UsersTelegramController::class, 'index'])->name('admin/users');
    Route::get('users/{id}', [UsersTelegramController::class, 'show'])->name('admin/users/{id}');

    Route::get('message', [ChatController::class, 'index'])->name('admin/message');
    Route::get('message/{id}', [ChatController::class, 'show'])->name('admin/message/{id}');
    Route::post('message/send', [ChatController::class, 'store'])->name('admin/message/send');

    Route::get('broadcast-message', [MessageBroadcastController::class, 'index'])->name('admin/broadcast-message');
    Route::post('broadcast-message/send', [MessageBroadcastController::class, 'store'])->name('admin/broadcast-message/send');
    Route::post('broadcast-message/resend', [MessageBroadcastController::class, 'resend'])->name('admin/broadcast-message/resend');

    Route::get('command', [CommandController::class, 'index'])->name('admin/command');
    Route::put('command', [CommandController::class, 'update'])->name('admin/command/update');

    Route::get('weathers', [WeathersController::class, 'index'])->name('admin/weathers');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
})->name('home')->middleware('guest');
