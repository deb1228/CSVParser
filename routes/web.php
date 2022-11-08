<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FileController;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');


Route::middleware([ 'auth:sanctum', 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::post('/upload/csv', [])
});
Route::get('/DataSet',function(){
        // PAth of View
    return Inertia::render('DataSetProcessing');
    
});

Route::get('/GraphPresentation',function(){
    // PAth of View
return Inertia::render('GraphPresentation');

});
Route::get('/Login2',function(){
    // PAth of View
return Inertia::render('Login2');

});

Route::get('/GraphSelect',function(){
    // PAth of View
return Inertia::render('GraphSelect');

});

Route::post('file/upload', [FileController::class, 'upload'])->name('file.upload');

