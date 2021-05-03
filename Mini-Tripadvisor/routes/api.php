<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\CommentaireController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json(['message'=>'Tripasvisor API']);
})->name('home');


Route::get('/etablissement', [EtablissementController::class, 'getAll']);
Route::get('/etablissement/{id}', [EtablissementController::class, 'getByID']); 
Route::post('/etablissement', [EtablissementController::class, 'create']);
Route::delete('/etablissement/{id}', [EtablissementController::class, 'delete']);


//Route::get('/etablissement/{id}/commentaire/{id}', [CommentaireController::class, 'getByID']);
Route::get('/etablissement/{id}/commentaire', [CommentaireController::class, 'getAllFromEtablissement']);
Route::post('/etablissement/{id}/commentaire', [CommentaireController::class, 'create']);
//Route::delete('/etablissement/{id}/commentaire/{id}', [CommentaireController::class, 'delete']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
