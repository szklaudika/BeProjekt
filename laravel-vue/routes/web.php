<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Mail;


Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$');

Route::post('/admin/register', [AdminRegistrationController::class, 'register']);
Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::post('/registracia', [UserRegistrationController::class, 'register']);

Route::get('/api/admin/speakers', [SpeakerController::class, 'index']);
Route::post('/admin/speakers', [SpeakerController::class, 'store']);
Route::put('/api/admin/speakers/{speaker}', [SpeakerController::class, 'update']);
Route::delete('/admin/speakers/{speaker}', [SpeakerController::class, 'destroy']);
Route::get('/api/admin/speakers/{speaker}', [SpeakerController::class, 'show']);

Route::get('/api/admin/programs', [ProgramController::class, 'index']);
Route::get('/api/admin/programs/{program}', [ProgramController::class, 'show']);
Route::post('/admin/programs', [ProgramController::class, 'store']);
Route::put('/api/admin/programs/{program}', [ProgramController::class, 'update']);
Route::delete('/admin/programs/{program}', [ProgramController::class, 'destroy']);

Route::post('/admin/gallery', [GalleryController::class, 'store']);
Route::get('/api/gallery', [GalleryController::class, 'index']);

Route::post('/admin/sponsors', [SponsorController::class, 'store']);
Route::get('/api/sponsors', [SponsorController::class, 'index']);

Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Mailtrap!', function ($message) {
        $message->to('danielf0804@gmail.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});