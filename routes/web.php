<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AHPController,
    BencanaController,
	IndeksKapasitasController,
	KerentananSosialController,
	KerentananEkonomiController,
	KerentananFisikController,
	KerentananLingkunganController,
	HomeController,
	PageController,
	RegisterController,
	LoginController,
	UserProfileController,
	ResetPassword,
	ChangePassword,
    FAHPController,
    JsonController
};

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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/jawa-timur.json', function () {
    return response()->file('public/jawa-timur.json');
});

Route::get('/map-ahp', function () {
    return view('map-ahp');
});

Route::post('/get-color-ahp', [App\Http\Controllers\JsonController::class, 'getColorAHP']);


Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	Route::get('/{page}', [PageController::class, 'index'])->name('page'); // for routes with static pages

	// for routes with 'data' prefix
	Route::prefix('data')->group(function () {

		// bencana routes
		Route::get('/bencana', [BencanaController::class, 'index'])->name('bencana');
		Route::post('/bencana', [BencanaController::class, 'store'])->name('bencana.store');
		Route::post('/bencana/{id}', [BencanaController::class, 'update'])->name('bencana.update');
		Route::delete('/bencana/{id}', [BencanaController::class, 'destroy'])->name('bencana.destroy');

		// indeks kapasitas routes
		Route::get('/indeks-kapasitas', [IndeksKapasitasController::class, 'index'])->name('indeks-kapasitas');
		Route::post('/indeks-kapasitas', [IndeksKapasitasController::class, 'store'])->name('indeks-kapasitas.store');
		Route::post('/indeks-kapasitas/{id}', [IndeksKapasitasController::class, 'update'])->name('indeks-kapasitas.update');
		Route::delete('/indeks-kapasitas/{id}', [IndeksKapasitasController::class, 'destroy'])->name('indeks-kapasitas.destroy');

		// kerentanan sosial routes
		Route::get('/kerentanan-sosial', [KerentananSosialController::class, 'index'])->name('kerentanan-sosial');
		Route::post('/kerentanan-sosial', [KerentananSosialController::class, 'store'])->name('kerentanan-sosial.store');
		Route::post('/kerentanan-sosial/{id}', [KerentananSosialController::class, 'update'])->name('kerentanan-sosial.update');
		Route::delete('/kerentanan-sosial/{id}', [KerentananSosialController::class, 'destroy'])->name('kerentanan-sosial.destroy');

		// kerentanan ekonomi routes
		Route::get('/kerentanan-ekonomi', [KerentananEkonomiController::class, 'index'])->name('kerentanan-ekonomi');
		Route::post('/kerentanan-ekonomi', [KerentananEkonomiController::class, 'store'])->name('kerentanan-ekonomi.store');
		Route::post('/kerentanan-ekonomi/{id}', [KerentananEkonomiController::class, 'update'])->name('kerentanan-ekonomi.update');
		Route::delete('/kerentanan-ekonomi/{id}', [KerentananEkonomiController::class, 'destroy'])->name('kerentanan-ekonomi.destroy');

		// kerentanan fisik routes
		Route::get('/kerentanan-fisik', [KerentananFisikController::class, 'index'])->name('kerentanan-fisik');
		Route::post('/kerentanan-fisik', [KerentananFisikController::class, 'store'])->name('kerentanan-fisik.store');
		Route::post('/kerentanan-fisik/{id}', [KerentananFisikController::class, 'update'])->name('kerentanan-fisik.update');
		Route::delete('/kerentanan-fisik/{id}', [KerentananFisikController::class, 'destroy'])->name('kerentanan-fisik.destroy');

		// kerentanan lingkungan routes
		Route::get('/kerentanan-lingkungan', [KerentananLingkunganController::class, 'index'])->name('kerentanan-lingkungan');
		Route::post('/kerentanan-lingkungan', [KerentananLingkunganController::class, 'store'])->name('kerentanan-lingkungan.store');
		Route::post('/kerentanan-lingkungan/{id}', [KerentananLingkunganController::class, 'update'])->name('kerentanan-lingkungan.update');
		Route::delete('/kerentanan-lingkungan/{id}', [KerentananLingkunganController::class, 'destroy'])->name('kerentanan-lingkungan.destroy');

		//AHP



	});

	Route::prefix('AHP')->group(function () {
        Route::post('/get-color', [JsonController::class, 'getColor']);
		//ahp
		Route::get('/proses-AHP', [AHPController::class, 'index'])->name('AHP');
        Route::get('/map-ahp', function () {
            return view('data.fahp.map-ahp');
        })->name('MapAHP');

		//fahp
		Route::get('/proses-FAHP', [FAHPController::class, 'index'])->name('FAHP');
        Route::get('/map-fuzzy', function () {
            return view('data.fahp.map-fuzzyahp');
        })->name('MapFuzzy');
	});
});
