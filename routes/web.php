<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarsController;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('test', function () {
//     return "welcome to test page";
// });
// Route::get('user/{id}', function ($id) {
//     return " the user id is  " . $id;
// });
// Route::get('user/{name}/{age}', function ($name,$age) {
//     return " the user name is  " . $name."  and the age is  ".$age;
// });
// Route::get('user/{name}/{age?}', function ($name,$age=0) {
//     $msg=" the user name is  " . $name;
//     if($age>0){
//          $msg.= "and the age is  ".$age;
//     }
//     return $msg;
// })->whereIn('name',['reham','aya']);
// Route::prefix('product')->group(function(){
//     Route::get('/', function (){
//         return "welcome to home page";});
//     Route::get('laptop', function () {
//         return "welcome to laptop page";
//     });
//     Route::get('mobiles', function () {
//         return "welcome to mobiles page";
//     });
// });
// Route::get('about', function () {
//     return "welcome to about page";
// });
// Route::get('Contact us', function () {
//     return "welcome to contact us page";
// });
// Route::prefix('Support')->group(function(){
//     Route::get('/', function (){
//         return "welcome to support page";});
//     Route::get('Chat', function () {
//         return "welcome to chat page";
//     });
//     Route::get('call', function () {
//         return "welcome to call page";
//     });
//     Route::get('ticket', function () {
//         return "welcome to ticket page";
//     });
// });


// Route::prefix('Training')->group(function(){
//     Route::get('/', function (){
//         return "welcome to Training page";});
//     Route::get('HR', function () {
//         return "welcome to HR page";
//     });
//     Route::get('ICT', function () {
//         return "welcome to ICT page";
//     });
//     Route::get('MARKETING', function () {
//         return "welcome to marketing page";
//     });
//     Route::get('Logistics', function () {
//         return "welcome to logistics page";
//     });
// });
// Route::fallback( function () {
//    return redirect ('/');
// });
Route::get('cv', function () {
    return view('cv');
});
// Route::get('login', function () {
//     return view('login');
// });
// Route::post('receive', function () {
//     return ' data received';
// })->name('receive');
// Route::get('test',[ExampleController::class ,'test']);
Route::get('addCar', function () {
    return view('addCar');
});
Route::post('carDetails',[CarsController::class ,'read']);
