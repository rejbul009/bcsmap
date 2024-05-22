<?php

use Dotenv\Store\StoreBuilder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');



Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('is_admin')->name('admin');
Route::get('/payment/details', [AdminController::class, 'payment'])->middleware('is_admin')->name('payment.details');
Route::delete('/admin/payment/{id}', [AdminController::class, 'deletePayment'])->name('payment.delete');
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/usersearch', [PostController::class, 'usersearch'])->name('userposts.search');


// post 
Route::resource('posts', PostController::class);
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('user.post');

// categories
Route::get('categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
Route::post('categories', [CategoriesController::class, 'store'])->name('admin.categories.store');
Route::get('categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('categories/{id}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
Route::put('categories/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('categories/{id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
Route::get('category/{categoryId}/posts', [PostController::class, 'postsByCategory'])->name('category.posts');

// contact
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');