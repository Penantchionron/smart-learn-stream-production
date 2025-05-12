<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;

//routes pour l'authentification
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
//Page d'accueil
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

//Dashboard pour tous
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'name' => \Illuminate\Support\Facades\Auth::user()->name, // Récupère le nom de l'utilisateur connecté
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

//Dashboard admin
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Routes Admin
Route::middleware(['auth', 'admin'])->group(function () {
    //CRUD Videos
    Route::resource('videos', VideoController::class);
    //CRUD roles
    Route::resource('roles', RoleController::class);
    //CRUD Commentaires
    Route::resource('commentaires', CommentaireController::class);
    //CRUD Categories
    Route::resource('categories', CategorieController::class);
    //CRUD Users
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
