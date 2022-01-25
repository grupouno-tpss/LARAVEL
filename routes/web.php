<?php

use App\Http\Controllers\chatController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\workController;
use Illuminate\Support\Facades\Route;

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

Route::get('/anuncios', function () {
    return view('anuncios');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [workController::class, 'ads'])->middleware(['auth'])->name('dashboard');
Route::get('/calendar', [workController::class, 'calendar'])->middleware(['auth'])->name('calendar');
Route::get('/actividades', [workController::class, 'actividades'])->middleware(['auth'])->name('actividades');
Route::post('/generateWork', [workController::class, 'generateWork'])->middleware(['auth'])->name('generateWork');
Route::post('/generateAd', [workController::class, 'generateAd'])->middleware(['auth'])->name('generateAd');
Route::get("sendEmail", [MailController::class, "sendAdEmail"])->middleware(['auth']);
Route::get("sendAllEmail", [chatController::class, "messageEmail"])->middleware(['auth'])->name('allEmail');
Route::get('/chat', [chatController::class, 'chat'])->middleware(['auth'])->name('chat');
Route::get('/groupFolder', [workController::class, 'groupFolder'])->middleware(['auth'])->name('groupFolder');
Route::post('/message', [chatController::class, 'message'])->middleware(['auth'])->name('createMessage');

require __DIR__.'/auth.php';
