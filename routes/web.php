<?php

use App\Http\Controllers\ContactRequestController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contact_us', ContactRequestController::class)->only('index', 'store');


// Route::get('/mailable', function () {
//     return new \App\Mail\ContactRequestCreatedMail(
//         \App\Models\ContactRequest::orderByDesc('created_at')->first()
//     );
// });
