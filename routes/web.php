<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galerie', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/inscription', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/inscription', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/inscription/success', [RegistrationController::class, 'success'])->name('registration.success');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/inscriptions', [AdminController::class, 'inscriptions'])->name('inscriptions');
    Route::get('/inscriptions/export', [AdminController::class, 'exportRegistrations'])->name('inscriptions.export');
    Route::delete('/inscriptions/{registration}', [AdminController::class, 'destroyRegistration'])->name('inscriptions.destroy');
    
    // CRUD Services
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::get('/services/create', [AdminController::class, 'createService'])->name('services.create');
    Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
    Route::get('/services/{service}/edit', [AdminController::class, 'editService'])->name('services.edit');
    Route::put('/services/{service}', [AdminController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{service}', [AdminController::class, 'destroyService'])->name('services.destroy');
    
    Route::get('/medias', [AdminController::class, 'medias'])->name('medias');
    Route::post('/medias', [AdminController::class, 'storeMedia'])->name('medias.store');
    Route::delete('/medias/{media}', [AdminController::class, 'destroyMedia'])->name('medias.destroy');

    Route::get('/contenus', [AdminController::class, 'contents'])->name('contents');
    Route::post('/contenus', [AdminController::class, 'updateContents'])->name('contents.update');
    Route::get('/utilisateurs', [AdminController::class, 'users'])->name('users');
    Route::get('/utilisateurs/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/utilisateurs', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/utilisateurs/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/utilisateurs/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/utilisateurs/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // CRUD Témoignages
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('testimonials');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('testimonials.store');
    Route::delete('/testimonials/{testimonial}', [AdminController::class, 'destroyTestimonial'])->name('testimonials.destroy');

    // Gestion Abonnés
    Route::get('/subscribers', [AdminController::class, 'subscribers'])->name('subscribers');
    Route::delete('/subscribers/{subscriber}', [AdminController::class, 'destroySubscriber'])->name('subscribers.destroy');

    Route::get('/parametres', [AdminController::class, 'settings'])->name('settings');
});

Route::post('/newsletter', [App\Http\Controllers\NewsletterController::class, 'store'])->name('newsletter.store');
