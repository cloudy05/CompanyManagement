<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'lang'])->group(function () {
    Route::resource('employees', EmployeesController::class);
    Route::resource('companies', CompaniesController::class);
});

Route::post('lang/set', function (Request $request) {
    if (!$request->has('lang') && !in_array($request->lang, ['en', 'hi'])) {
        abort(400);
    }
    session()->put('lang', $request->lang);
    App::setLocale($request->lang);
    return redirect()->back();
})->name('setLocal');
