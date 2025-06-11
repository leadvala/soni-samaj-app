<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\FrontEndController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\RegisterSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\HomeSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [FrontEndController::class, 'index'])->name('front.index');
Route::get('/about', [FrontEndController::class, 'about'])->name('front.about');
Route::get('/blog/{slug}', [FrontEndController::class, 'blog'])->name('front.blogs');
Route::get('/sangathan', [FrontEndController::class, 'sangathan'])->name('front.sangathan');
Route::get('/kul-devta', [FrontEndController::class, 'kul_devta'])->name('front.kul_devta');
Route::get('/job-search', [FrontEndController::class, 'job_search'])->name('front.job_search');
Route::get('/events', [FrontEndController::class, 'events'])->name('front.events');
Route::get('/events/detail', [FrontEndController::class, 'event_detail'])->name('front.event_detail');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('front.contact');
Route::get('/register-member', [FrontEndController::class, 'register_member'])->name('front.register_member');
Route::post('/store-member', [FrontEndController::class, 'store_member'])->name('front.store_member');

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => 'auth'], function () {
    Route::controller(SliderController::class)->group(function () {
        Route::resource('sliders', SliderController::class);
        Route::post('/sliders/toggle-status/{id}', [SliderController::class, 'toggleStatus'])->name('sliders.toggle-status');

    });
    Route::resource('/register-sections', RegisterSectionController::class);
    Route::resource('about-sections', AboutSectionController::class);
    Route::post('about-sections/tabs', [AboutSectionController::class, 'tabStore'])->name('about-sections.tabs');
    Route::post('about-sections/tabs/destroy/{id}', [AboutSectionController::class, 'destroyTab'])->name('about-sections.tabs-destroy');
    Route::post('about-sections/tabs/update', [AboutSectionController::class, 'updateTab'])->name('about-sections.tabs-update');

    Route::resource('/pages', PageController::class);
    Route::resource('service-sections', ServiceSectionController::class);
    Route::resource('case-studies', CaseStudyController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('home-settings', HomeSettingController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('donations', DonationController::class);
});

require __DIR__.'/auth.php';
