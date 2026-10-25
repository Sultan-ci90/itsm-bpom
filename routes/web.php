<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CaptchaController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Api\UserSearchController;


// =========================
// AUTHENTICATION
// =========================

Route::middleware('guest')->group(function () {

    Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('signin');

    Route::get('/captcha', [CaptchaController::class, 'image'])
        ->middleware('throttle:30,1')->name('captcha.image');

    Route::post('/signin', [LoginController::class, 'login'])
        ->middleware('throttle:10,1')->name('login');

});


// =========================
// AUTHENTICATED
// =========================

Route::middleware('auth')->group(function () {
    // =========================
    // NOTIFICATIONS
    // =========================
    Route::post('/notifications/read-all', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi ditandai sudah dibaca.');
    })->name('notifications.readAll');

    Route::get('/notifications/{id}/read', function ($id) {
        $notification = auth()->user()->notifications()->findOrFail($id);
        if ($notification->unread()) {
            $notification->markAsRead();
        }
        $targetUrl = $notification->data['url'] ?? route('home');
        return redirect($targetUrl);
    })->name('notifications.readAndRedirect');

    Route::delete('/notifications/destroy-all', function () {
        auth()->user()->notifications()->delete();
        return back()->with('success', 'Semua notifikasi berhasil dihapus.');
    })->name('notifications.destroyAll');

    Route::get('/', function () {
        $user = auth()->user();

        if ($user && $user->isPelapor()) {
            return view('pages.choice.index');
        }

        return redirect()->route('dashboard');
    })->name('home');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    // DASHBOARD (Halaman staf IT, pelapor otomatis dialihkan ke Pilih Fitur di controller)
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/dashboard/trend-data', [DashboardController::class, 'trendData'])
        ->name('dashboard.trendData');

    // =========================
    // INCIDENT (Lapor Kendala)
    // =========================
    Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
    Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');
    Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
    
    // PENTING: route literal /incidents/all HARUS sebelum /incidents/{ticket}
    Route::get('/incidents/all', [IncidentController::class, 'all'])
        ->middleware('role:teknisi,admin')
        ->name('incidents.all');
        
    Route::get('/incidents/{ticket}', [IncidentController::class, 'show'])->name('incidents.show');
    Route::post('/incidents/{ticket}/take', [IncidentController::class, 'take'])
        ->middleware('role:teknisi,admin')
        ->name('incidents.take');
    Route::put('/incidents/{ticket}', [IncidentController::class, 'update'])->name('incidents.update');
    Route::get('/incidents/{ticket}/justifikasi', [IncidentController::class, 'justifikasi'])
        ->middleware('role:teknisi,admin')
        ->name('incidents.justifikasi');
    Route::get('/incidents/{ticket}/edit', [IncidentController::class, 'edit'])
        ->name('incidents.edit');
    Route::put('/incidents/{ticket}/data', [IncidentController::class, 'updateData'])
        ->name('incidents.updateData');
    Route::get('/incidents/{ticket}/edit-resolution', [IncidentController::class, 'editResolution'])
        ->middleware('role:teknisi,admin')
        ->name('incidents.editResolution');
    Route::put('/incidents/{ticket}/resolution', [IncidentController::class, 'updateResolution'])
        ->middleware('role:teknisi,admin')
        ->name('incidents.updateResolution');
    Route::delete('/incidents/{ticket}/destroy', [IncidentController::class, 'destroy'])
        ->middleware('role:teknisi,admin')
        ->name('incidents.destroy');

    
    // =========================
    // SERVICE REQUEST (Permintaan Layanan)
    // =========================
    Route::get('/requests', [ServiceRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [ServiceRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [ServiceRequestController::class, 'store'])->name('requests.store');
    
    // PENTING: route literal /requests/all HARUS sebelum /requests/{req}
    Route::get('/requests/all', [ServiceRequestController::class, 'all'])
        ->middleware('role:teknisi,admin')
        ->name('requests.all');
        
    Route::get('/requests/{req}', [ServiceRequestController::class, 'show'])->name('requests.show');
    Route::post('/requests/{req}/take', [ServiceRequestController::class, 'take'])
        ->middleware('role:teknisi,admin')
        ->name('requests.take');
    Route::put('/requests/{req}', [ServiceRequestController::class, 'update'])->name('requests.update');
    Route::get('/requests/{req}/edit', [ServiceRequestController::class, 'edit'])
        ->name('requests.edit');
    Route::put('/requests/{req}/data', [ServiceRequestController::class, 'updateData'])
        ->name('requests.updateData');
    Route::get('/requests/{req}/edit-resolution', [ServiceRequestController::class, 'editResolution'])
        ->middleware('role:teknisi,admin')
        ->name('requests.editResolution');
    Route::put('/requests/{req}/resolution', [ServiceRequestController::class, 'updateResolution'])
        ->middleware('role:teknisi,admin')
        ->name('requests.updateResolution');
    Route::post('/requests/{req}/chats', [ServiceRequestController::class, 'storeChat'])
        ->name('requests.chats.store');
    Route::post('/requests/{req}/chats/toggle', [ServiceRequestController::class, 'toggleChatStatus'])
        ->middleware('role:teknisi,admin')
        ->name('requests.chats.toggle');
    Route::post('/requests/{req}/confirm-selesai', [ServiceRequestController::class, 'confirmCompleted'])
        ->name('requests.confirmCompleted');
    Route::delete('/requests/{req}/destroy', [ServiceRequestController::class, 'destroy'])
        ->middleware('role:teknisi,admin')
        ->name('requests.destroy');

    // =========================
    // MASTER DATA (Setup Lokasi & Petugas)
    // =========================
    Route::middleware('role:teknisi,admin')->prefix('master')->name('master.')->group(function () {
        Route::get('/', fn() => redirect()->route('master.lokasi.index'));

        // Setup Lokasi Ruangan
        Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
        Route::post('/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
        Route::put('/lokasi/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
        Route::delete('/lokasi/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');

        // Setup Petugas & Role
        Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
        Route::post('/petugas', [PetugasController::class, 'store'])->name('petugas.store');
        Route::put('/petugas/{user}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::delete('/petugas/{user}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
    });

    // =========================
    // LAPORAN & REKAPITULASI (Khusus Staff)
    // =========================
    Route::middleware('role:teknisi,admin')->prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::post('/export', [ReportController::class, 'export'])->name('export');
    });

    // =========================
    // PANDUAN & FAQ (KNOWLEDGE BASE)
    // =========================
    Route::prefix('panduan')->name('panduan.')->group(function () {
        Route::get('/', [KnowledgeBaseController::class, 'index'])->name('index');
        Route::get('/create', [KnowledgeBaseController::class, 'create'])->name('create');
        Route::post('/', [KnowledgeBaseController::class, 'store'])->name('store');
        Route::get('/{slug}', [KnowledgeBaseController::class, 'show'])->name('show');
        Route::get('/{panduan}/edit', [KnowledgeBaseController::class, 'edit'])->name('edit');
        Route::put('/{panduan}', [KnowledgeBaseController::class, 'update'])->name('update');
        Route::delete('/{panduan}', [KnowledgeBaseController::class, 'destroy'])->name('destroy');
        Route::post('/{panduan}/feedback', [KnowledgeBaseController::class, 'feedback'])->name('feedback');
    });

    // =========================
    // PENGATURAN SISTEM (WhatsApp Gateway Fonnte)
    // =========================
    Route::middleware('role:teknisi,admin')->prefix('settings')->name('settings.')->group(function () {
        Route::get('/whatsapp', [SettingController::class, 'whatsapp'])->name('whatsapp');
        Route::put('/whatsapp', [SettingController::class, 'updateWhatsapp'])->name('whatsapp.update');
        Route::post('/whatsapp/test-send', [SettingController::class, 'testSend'])->name('whatsapp.test_send');
    });
});

// =========================
// API (AJAX auto-fill lokasi) — diproteksi auth session yang sama
// =========================
Route::middleware('auth')->prefix('api')->group(function () {
    Route::get('/assets/{id}', [IncidentController::class, 'getAssetDetail']);

    // API Khusus Staf (Search user & lokasi dinamis)
    Route::middleware('role:teknisi,admin')->group(function () {
        Route::get('/users/search', [UserSearchController::class, 'search'])->name('api.users.search');
        Route::get('/lokasi-by-bidang/{bidangId?}', [LokasiController::class, 'getByBidang'])->name('api.lokasi.by_bidang');
    });
});

// =========================
// OTHER PAGES (template demo)
// =========================

Route::get('/error-404', function () {
    return view('pages.errors.error-404', [
        'title' => 'Error 404'
    ]);
})->name('error-404');

Route::middleware('auth')->group(function () {
    Route::get('/calendar', function () {
        return view('pages.calender', [
            'title' => 'Calendar'
        ]);
    })->name('calendar');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

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
});