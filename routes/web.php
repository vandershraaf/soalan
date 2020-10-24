<?php

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

Route::get('/test', function () {
    return view('test');
});

Route::get("/dashboard", \App\Http\Livewire\Dashboard::class);


Route::get("/topic/add", \App\Http\Livewire\TopicAddPage::class);

Route::get("/topic/edit/{id}", \App\Http\Livewire\TopicEditPage::class);


Route::get("/quiz/{topicId}", \App\Http\Livewire\QuizPage::class);
