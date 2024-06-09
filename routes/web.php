<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InformaticienController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ReseauController;
use App\Http\Controllers\MaterielController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware'=>'auth','web'],function(){
    Route::resource('user', 'UserController');
    Route::resource('demande', DemandeController::class);
    Route::resource('rapport', 'RapportController');
    Route::resource('type', 'TypeController');
    Route::resource('informaticien', 'InformaticienController');
    Route::resource('typeuser', 'TypeUserController');
    Route::resource('reseau', ReseauController::class);
    Route::resource('materiel', MaterielController::class);
});
   
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/',function(){
    return view('home.welcome');
});
route::get('/accueil',function(){
    return view('home.welcome');
})->name('accueil');
route::get('/a_propos',function(){
    return view('home.propos');
})->name('a-propos');
route::get('/service',function(){
    return view('home.service');
})->name('service');





// Route::group(['auth'=>'middleware'],function(){
//     // Routes pour les administrateurs
// Route::middleware(['web','check.admin: admin'])->group(function(){
//     Route::resource('admin/dashboard', AdminController::class);
//    ;
// });

// // Routes pour les informaticiens
// Route::middleware(['web','check.info:informaticien'])->group(function(){
//     Route::resource('informaticien/dashboard', InformaticienController::class);
   
//     // Autres routes spécifiques aux informaticiens
// });


// Route::middleware(['web','check.user:user'])->group(function(){
//     Route::resource('user/dashboard', UserController::class);
    
//     // Autres routes spécifiques aux utilisateurs
// });

// //Routes partagées entre tous les types d'utilisateurs
// Route::middleware(['web','auth'])->group(function(){
//     Route::resource('rapport', 'RapportController');
//     Route::resource('demande', 'DemandeController');
//     // Autres routes partagées
// });
// });


