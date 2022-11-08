<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\FileController;
use App\Http\Requests\GraphPresentationRequest;
use App\Http\Requests\GraphSelectRequest;
use GuzzleHttp\Psr7\Request;

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

Route::post('/GraphPresentation',function(GraphPresentationRequest $request){
    $options = $request->validated()['options'];
    $series = $request->validated()['series'];
    return Inertia::render('GraphPresentation', [
        'options' => $options,
        'series' => $series,
    ]);

})->name('graph.presentation');
Route::get('/Login2',function(){
    // PAth of View
return Inertia::render('Login2');

});

Route::post('/GraphSelect',function(GraphSelectRequest $request){
    $series = $request->validated()['series'];
    return Inertia::render('GraphSelect', [
        'series' => $series
    ]);
})->name('chart.select');

Route::post('file/upload', [FileController::class, 'upload'])->name('file.upload');

