<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Point;
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
    $user = auth()->user();
    if($user) {
      $userRecord = Point::where('user_email', $user->email)->max('point');
      $allRecord = Point::all()->max('point');
      if ($userRecord==null){
        $userRecord = 0;
      }
      if ($allRecord==null){
        $allRecord = 0;
      }
      return view('welcome', ["userRecord"=>$userRecord, "allRecord"=>$allRecord]);
    }
    return view('welcome', ["userRecord"=>0, "allRecord"=>0]);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/point', 'PointController@store');
