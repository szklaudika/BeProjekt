<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SpeakerController;

// Define API routes or other server-side routes here

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

Route::get('/admin/programs/{id}', [ProgramController::class, 'show']);
Route::post('/admin/programs', [ProgramController::class, 'store']);









