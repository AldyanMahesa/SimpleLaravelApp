<?php

use App\Http\Controllers\MoviesController;
use App\Models\ProductionCompany;
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

Route::get('/', [MoviesController::class, 'popularity']);

//for json
Route::resource('movies',MoviesController::class)->parameters(['movies'=>'id']);
Route::get('company{id}',function ($id){
    return response()->json(ProductionCompany::where('id',$id)->first());
});
