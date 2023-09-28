<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BackCategorieController;
use App\Http\Controllers\admin\BackMenuController;
use App\Http\Controllers\admin\backReservationController;
use App\Http\Controllers\admin\BackTableController;
use App\Http\Controllers\admin\ComandeController;
use App\Http\Controllers\admin\GenerateReservationController;
use App\Http\Controllers\front\AccueilController;
use App\Http\Controllers\front\FrontCommandeController;
use App\Http\Controllers\front\FrontMenuController;
use App\Http\Controllers\front\FrontReservationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//admin 
Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('reservations', backReservationController::class);
    Route::resource('tables', BackTableController::class);
    Route::resource('menus', BackMenuController::class);
    Route::resource('categories', BackCategorieController::class);
    Route::resource('comandes', ComandeController::class);
});

//PDF
Route::get('/reservastions.pdf', [GenerateReservationController::class, 'imprime'])->name('pdf');
Route::get('/reservastions.see', [GenerateReservationController::class, 'index'])->name('voire.pdf');

// le front end
//Accueil
Route::get('/', [AccueilController::class, 'index'])->name('accueil');
//Menu
Route::get('/plats', [FrontMenuController::class, 'index'])->name('plats');
//categories
Route::get('/categorie/menus/{categorie_id}', [AccueilController::class, 'show'])->name('categorie.menus');
//commande 
Route::get('/livraison', [FrontCommandeController::class, 'create'])->name('livraison.create');
Route::post('/livraison', [FrontCommandeController::class, 'store'])->name('livraison.store');
//reservations 
Route::get('/reservation/table', [FrontReservationController::class, 'create'])->name('reservation.table');
Route::post('/reservation/table', [FrontReservationController::class, 'store'])->name('reservation.table.store');

//Merci
//validationc de la comande et de la reservation
Route::get('/merci', function () {
    return view('merci');
})->name('merci');

//infos
Route::get('/infos', function () {
    return view('infos');
})->name('infos');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
