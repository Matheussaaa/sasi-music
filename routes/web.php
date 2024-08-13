<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Jobs_postsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/logout', [Controller::class, 'logout'])->name('logout');
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/logando', [Controller::class, 'logando'])->name('logando');

//trabalho e aplicação
Route::post('/jobs/{job}/apply', [Jobs_postsController::class, 'apply'])->name('jobs.apply');
Route::get('/applications', [Controller::class, 'showApplications'])->name('jobs.applications');

//home
Route::get('/home', [Controller::class, 'index'])->name('home');
//trabalho
Route::get('/jobs', [Controller::class, 'jobs'])->name('jobs');

// Rota para visualizar o perfil do usuário
Route::get('/user/{user_id}', [UserController::class, 'showProfile'])->name('user.profile');
//notificações
Route::get('/notifications', [Controller::class, 'showNotification'])->name('notifications');

//cração de post
Route::get('/post-create', [PostController::class, 'create'])->name('post.create');
Route::post('/post-store', [PostController::class, 'store'])->name('post.store');
//criação de usuario
Route::get('/user-create', [UserController::class, 'create'])->name('user.create');
Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
//criação de job
Route::get('/job-create', [Jobs_postsController::class, 'create'])->name('job.create');
Route::post('/job-store', [Jobs_postsController::class, 'store'])->name('job.store');
//notification
Route::post('/notification-store', [NotificationController::class, 'store'])->name('notifications.store');