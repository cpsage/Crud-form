<?php

use App\Http\Controllers\StudentController;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(StudentController::class)->group(function() {
    Route::get('/', 'showUsers')->name('home');

Route::get('/user/{id}', 'singleUser')->name('view.user');

Route::post('/add', 'addUser')->name('addUser');

Route::put('/update/{id}', 'updateUser')->name('update.user');

Route::get('/updatepage/{id}', 'updatePage')->name('update.page');

Route::get('/delete/{id}', 'deleteUser')->name('delete.user');
});



Route::view('newuser', '/adduser');