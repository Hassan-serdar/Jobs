<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Jobs\TranslatedJob;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

Route::get("test",function(){
    TranslatedJob::dispatch();
    return "done";
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

 Route::get('/jobs', [JobController::class, 'index']);
 Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
 Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
 Route::get('/jobs/{job}', [JobController::class, 'show']);

 Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
     ->middleware('auth')
     ->can('edit', 'job');

 Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('edit','job');
 Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
 ->middleware('auth')
 ->can('edit','job');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
//اذا بدي بس شي محدد
//Route::resource('jobs',JobController::class,[
//only=>['index','store']
//]);
//اذا بدي كلشي ما عدا  شي 
//Route::resource('jobs',JobController::class,[
//exept=>['index','store']
//]);
//php artisan route:list --except-vendor اذا بدي شوف شو عندي توجيهات للصفحات
// Route::controller(JobController::class)->group(function(){
// Route::get('/jobs',"index");
// Route::get('/jobs/create',"create");
// Route::get('/jobs/{job}',"show");
// Route::post('/jobs',"store");
// Route::get('/jobs/{job}/edit',"edit");
// Route::patch('/jobs/{job}',"update");
// Route::delete('/jobs/{job}',"destroy");
// });
