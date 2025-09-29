<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Models\Type;
use App\Models\Category;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $typesCount = Type::count();
    $categoriesCount = Category::count();
    $usersCount = User::count();

    return view('dashboard', compact('typesCount', 'categoriesCount', 'usersCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

//Backend Routes.
Route::middleware('auth')->group(function () {

    // Types CRUD routes
    Route::get('/types', [TypeController::class, 'index'])->name('types');
    Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');
    Route::post('/types/store', [TypeController::class, 'store'])->name('types.store');
    Route::get('/types/edit/{id}', [TypeController::class, 'edit'])->name('types.edit');
    Route::post('/types/update/{id}', [TypeController::class, 'update'])->name('types.update');
    Route::delete('/types/delete/{id}', [TypeController::class, 'destroy'])->name('types.destroy');

    
    // Categories CRUD routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    // Users CRUD routes
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/categories/by-type/{type_id}', [UserController::class, 'getByType'])->name('categories.byType');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Frontend Routes.
Route::get('/web', [FrontendController::class, 'index'])->name('profile.destroy');
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/filter-users', [FrontendController::class, 'filterByType'])->name('filter.users');


require __DIR__.'/auth.php';
