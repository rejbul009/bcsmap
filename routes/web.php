<?php

use Dotenv\Store\StoreBuilder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ResultController;


Route::get('/', [HomeController::class, 'index'])->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



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

// student 

Route::middleware('auth')->group(function () {
    Route::get('/profileedit', [StudentController::class, 'edit'])->name('profile.edit');

    Route::get('/profile', [StudentController::class, 'index'])->name('profile');
    
    Route::post('/profile/update', [StudentController::class, 'update'])->name('profile.update');

});



// Subject Routes
Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
Route::get('subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

// Test Routes
Route::get('tests', [TestController::class, 'index'])->name('tests.index');
Route::get('tests/create', [TestController::class, 'create'])->name('tests.create');
Route::post('tests', [TestController::class, 'store'])->name('tests.store');
Route::get('tests/{test}', [TestController::class, 'show'])->name('tests.show');
Route::get('tests/{test}/edit', [TestController::class, 'edit'])->name('tests.edit');
Route::put('tests/{test}', [TestController::class, 'update'])->name('tests.update');
Route::delete('tests/{test}', [TestController::class, 'destroy'])->name('tests.destroy');

// Question Routes
Route::get('questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
Route::put('questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

// Choice Routes
Route::get('choices', [ChoiceController::class, 'index'])->name('choices.index');
Route::get('choices/create', [ChoiceController::class, 'create'])->name('choices.create');
Route::post('choices', [ChoiceController::class, 'store'])->name('choices.store');
Route::get('choices/{choice}', [ChoiceController::class, 'show'])->name('choices.show');
Route::get('choices/{choice}/edit', [ChoiceController::class, 'edit'])->name('choices.edit');
Route::put('choices/{choice}', [ChoiceController::class, 'update'])->name('choices.update');
Route::delete('choices/{choice}', [ChoiceController::class, 'destroy'])->name('choices.destroy');

// Answer Routes
Route::get('answers', [AnswerController::class, 'index'])->name('answers.index');
Route::get('answers/create', [AnswerController::class, 'create'])->name('answers.create');
Route::post('answers', [AnswerController::class, 'store'])->name('answers.store');
Route::get('answers/{answer}', [AnswerController::class, 'show'])->name('answers.show');
Route::get('answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');
Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');

// Result Routes
Route::get('results', [ResultController::class, 'index'])->name('results.index');
Route::get('results/create', [ResultController::class, 'create'])->name('results.create');
Route::post('results', [ResultController::class, 'store'])->name('results.store');
Route::get('results/{result}', [ResultController::class, 'show'])->name('results.show');
Route::get('results/{result}/edit', [ResultController::class, 'edit'])->name('results.edit');
Route::put('results/{result}', [ResultController::class, 'update'])->name('results.update');
Route::delete('results/{result}', [ResultController::class, 'destroy'])->name('results.destroy');
Route::get('tests/{test}', [TestController::class, 'show'])->name('tests.show');
Route::post('tests/{test}/submit', [TestController::class, 'submit'])->name('tests.submit');




