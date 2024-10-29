<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Regulation;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::get('/evaluasi', [LandingController::class, 'evaluation'])->name('landing.evaluation');
Route::post('/evaluasi', [LandingController::class, 'evaluationStore'])->name('landing.evaluation.store');
Route::get('/evaluasi/{slug}', [LandingController::class, 'evaluationDetail'])->name('landing.evaluation.detail');

Route::get('/front-peraturan', [LandingController::class, 'regulation'])->name('landing.front-peraturan');

Route::get('/partisipasi-publik', [LandingController::class, 'publicParticipation'])->name('landing.public-participation');
Route::get('/partisipasi-publik/{slug}', [LandingController::class, 'publicParticipationDetail'])->name('landing.public-participation.detail');
Route::post('/partisipasi-publik', [LandingController::class, 'publicParticipationStore'])->name('landing.public-participation.store');

Route::get('/dashboard', function () {
    $users = User::all();
    $regulations = Regulation::all();

    $pengusulan = Regulation::where('status', 'pengusulan')->count();
    $penyusunan_pembahasan = Regulation::where('status', 'penyusunan pembahasan')->count();
    $partisipasi_publik = Regulation::where('status', 'partisipasi publik')->count();
    $persetujuan_pimpinan = Regulation::where('status', 'persetujuan pimpinan')->count();
    $penyelarasan = Regulation::where('status', 'penyelarasan')->count();
    $penetapan = Regulation::where('status', 'penetapan')->count();
    $pengundangan_peraturan = Regulation::where('status', 'pengundangan peraturan')->count();
    $penyusunan_informasi = Regulation::where('status', 'penyusunan informasi')->count();
    $penyebarluasan = Regulation::where('status', 'penyebarluasan')->count();
    $laporan_proses = Regulation::where('status', 'laporan proses')->count();
    $analisa_evaluasi = Regulation::where('status', 'analisa evaluasi')->count();

    return view('pages.dashboard.index', compact(
        'users',
        'regulations',
        'pengusulan',
        'penyusunan_pembahasan',
        'partisipasi_publik',
        'persetujuan_pimpinan',
        'penyelarasan',
        'penetapan',
        'pengundangan_peraturan',
        'penyusunan_informasi',
        'penyebarluasan',
        'laporan_proses',
        'analisa_evaluasi'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    Route::get('peraturan/data/{type?}', [RegulationController::class, 'index'])->name('peraturan.index');
    Route::resource('peraturan', RegulationController::class)->except(['index']);

    Route::put('peraturan/update-status/{id}', [RegulationController::class, 'updateStatus'])->name('peraturan.update-status');

    Route::get('/log', LogController::class)->name('log');
    Route::get('/log-activity', [LogActivityController::class, 'index'])->name('log-activity');
});

require __DIR__ . '/auth.php';