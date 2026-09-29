<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ServiceRequestController;


// =========================
// AUTHENTICATION
// =========================

Route::middleware('guest')->group(function () {

    Route::get('/signin', [LoginController::class, 'showLoginForm'])
        ->name('signin');

    Route::post('/signin', [LoginController::class, 'login'])
        ->name('login');

});


// =========================
// AUTHENTICATED
// =========================

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    // =========================
    // INCIDENT (Lapor Kendala)
    // =========================
    Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
    Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');
    Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');

    // =========================
    // SERVICE REQUEST (Permintaan Layanan)
    // =========================
    Route::get('/requests', [ServiceRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [ServiceRequestController::class, 'store'])->name('requests.store');
    Route::get('/requests/all', [ServiceRequestController::class, 'all'])->name('requests.all');
    Route::get('/requests/{id}', [ServiceRequestController::class, 'show'])->name('requests.show');

});

// =========================
// API (AJAX auto-fill lokasi) — diproteksi auth session yang sama
// =========================
Route::middleware('auth')->prefix('api')->group(function () {
    Route::get('/assets/{id}', [IncidentController::class, 'getAssetDetail']);
});


// =========================
// OTHER PAGES
// =========================

Route::get('/calendar', function () {
    return view('pages.calender', [
        'title' => 'Calendar'
    ]);
})->name('calendar');

Route::get('/profile', function () {
    return view('pages.profile', [
        'title' => 'Profile'
    ]);
})->name('profile');

Route::get('/form-elements', function () {
    return view('pages.form.form-elements', [
        'title' => 'Form Elements'
    ]);
})->name('form-elements');

Route::get('/basic-tables', function () {
    return view('pages.tables.basic-tables', [
        'title' => 'Basic Tables'
    ]);
})->name('basic-tables');

Route::get('/blank', function () {
    return view('pages.blank', [
        'title' => 'Blank'
    ]);
})->name('blank');

Route::get('/error-404', function () {
    return view('pages.errors.error-404', [
        'title' => 'Error 404'
    ]);
})->name('error-404');

Route::get('/line-chart', function () {
    return view('pages.chart.line-chart', [
        'title' => 'Line Chart'
    ]);
})->name('line-chart');

Route::get('/bar-chart', function () {
    return view('pages.chart.bar-chart', [
        'title' => 'Bar Chart'
    ]);
})->name('bar-chart');


// =========================
// UI ELEMENTS
// =========================

Route::get('/alerts', function () {
    return view('pages.ui-elements.alerts', [
        'title' => 'Alerts'
    ]);
})->name('alerts');

Route::get('/avatars', function () {
    return view('pages.ui-elements.avatars', [
        'title' => 'Avatars'
    ]);
})->name('avatars');

Route::get('/badge', function () {
    return view('pages.ui-elements.badges', [
        'title' => 'Badges'
    ]);
})->name('badges');

Route::get('/buttons', function () {
    return view('pages.ui-elements.buttons', [
        'title' => 'Buttons'
    ]);
})->name('buttons');

Route::get('/image', function () {
    return view('pages.ui-elements.images', [
        'title' => 'Images'
    ]);
})->name('images');

Route::get('/videos', function () {
    return view('pages.ui-elements.videos', [
        'title' => 'Videos'
    ]);
})->name('videos');