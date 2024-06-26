<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegistrationController;

use App\Mail\ProgramRegistration;
use App\Models\Registration;
use App\Models\Program;
use Illuminate\Support\Facades\Mail;


Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$');

Route::post('/admin/register', [AdminRegistrationController::class, 'register']);
Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::get('/api/admin/speakers', [SpeakerController::class, 'index']);
Route::post('/admin/speakers', [SpeakerController::class, 'store']);
Route::put('/api/admin/speakers/{speaker}', [SpeakerController::class, 'update']); 
Route::delete('/admin/speakers/{speaker}', [SpeakerController::class, 'destroy']); 
Route::get('/api/admin/speakers/{speaker}', [SpeakerController::class, 'show']);

Route::get('/api/admin/programs', [ProgramController::class, 'index']);
Route::get('/api/admin/programs/{program}', [ProgramController::class, 'show']);
Route::post('api/admin/programs', [ProgramController::class, 'store']);
Route::put('/api/admin/programs/{program}', [ProgramController::class, 'update']);
Route::delete('api/admin/programs/{program}', [ProgramController::class, 'destroy']);

Route::post('/admin/gallery', [GalleryController::class, 'store']);
Route::get('/api/gallery', [GalleryController::class, 'index']);

Route::post('/admin/sponsors', [SponsorController::class, 'store']);
Route::get('/api/sponsors', [SponsorController::class, 'index']);

Route::post('/admin/reviews', [ReviewController::class, 'store']);
Route::get('api/admin/reviews', [ReviewController::class, 'index']);
Route::get('api/admin/reviews/{review}', [ReviewController::class, 'show']);
Route::put('api/admin/reviews/{review}', [ReviewController::class, 'update']);
Route::delete('/admin/reviews/{review}', [ReviewController::class, 'destroy']);

Route::post('/admin/pages', [PageController::class, 'store']);
Route::get('/api/pages', [PageController::class, 'index']);
Route::get('/api/pages/{page}', [PageController::class, 'show']);
Route::put('api/admin/pages/{page}', [PageController::class, 'update']);
Route::delete('/admin/pages/{page}', [PageController::class, 'destroy']);

Route::post('api/register', [RegistrationController::class, 'store']);
Route::get('api/admin/registrations', [RegistrationController::class, 'index']);
Route::post('api/user-registrations', [RegistrationController::class, 'userRegistrations']);
Route::delete('api/unregister/{id}', [RegistrationController::class, 'unregister']);

Route::get('/test-email', function () {
    $registration = Registration::first();
    $program = Program::first();

    Mail::to('klaudika.sz362@gmail.com')-send(new App\Mail\ProgramRegistration($registration, $program));

    return 'Email Sent';
});











