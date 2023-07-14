<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReadyController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\ShowTestController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AdminResultController;
use App\Http\Controllers\ImportOptionController;

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

Auth::routes();

Route::get('/', [TestsController::class, 'index'])->name('tests.index');

Route::prefix('candidate')->middleware(['auth','isApproved'])->group(function (){

    Route::get('/tests/ready/{id}', [ReadyController::class, 'index'])->name('tests.ready');

    Route::get('/tests/show/{id}',[ShowTestController::class,'show'])->name('tests.show');

    Route::resource('results', ResultsController::class);

});

Route::prefix('admin')->middleware(['auth','isAdmin','isApproved'])->group(function (){

    Route::resource('categories', CategoriesController::class);
    Route::resource('questions', QuestionsController::class);
    Route::resource('options', OptionsController::class);
    Route::get('/import', [ImportOptionController::class, 'index'])->name('import.index');
    Route::post('/import', [ImportOptionController::class, 'import'])->name('import.import');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::put('/users/update', [UsersController::class, 'update'])->name('users.update');

    Route::get('/results', [AdminResultController::class, 'index'])->name('adminResults.index');
    Route::get('/results/show/{id}', [AdminResultController::class, 'show'])->name('adminResults.show');

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('dashboard.analytics');

});
