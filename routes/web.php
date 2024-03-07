<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewsController;

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

Route::get('/',[ViewsController::class,'index'])->name('index');
Route::get('/about',[ViewsController::class,'about'])->name('about');
Route::get('/testimonial',[ViewsController::class,'testimonials'])->name('testimonial');
Route::get('/404',[ViewsController::class,'Error404'])->name('404');
Route::get('/contactUs',[ViewsController::class,'contactUs'])->name('contact');
Route::post('/contactUs',[ViewsController::class,'ContactForm'])->name('ContactForm');
Route::get('/property-agent',[ViewsController::class,'propertyAgent'])->name('propertyAgent');
Route::get('/property-list',[ViewsController::class,'propertyList'])->name('propertyList');
Route::get('/property-type',[ViewsController::class,'propertyType'])->name('propertyType');
Route::post('/upload',[ViewsController::class,'uploads'])->name('upload');
Route::get('upload',[ViewsController::class,'uploadForm']);