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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/users', 'UserController');
Route::resource('/surveys', 'SurveyController');
Route::resource('/questions', 'QuestionController');
Route::resource('/answers', 'AnswerController');
Route::resource('/entries', 'EntryController');
Route::post('/fillSurvey', 'AnswerController@fill')->name('fillSurvey');
Route::get('/thankYou', 'SurveyController@thankYou')->name('thankYou');
Route::get('/fill/{survey_id}', 'SurveyController@fill');
