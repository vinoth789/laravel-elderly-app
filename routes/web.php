<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('quiz')->group(function() {

Route::get('/add-question/{qNo}', 'AdminController@showAddQuizForm')->name('add.questions');
Route::get('/add', 'AdminController@showCreateQuizForm')->name('add.quiz');
Route::get('/view-question/{qNo}', 'FrameQuestionsController@index')->name('view.questions');
//Route::get('/create', 'AdminController@showCreateQuizForm')->name('create.qui');
//Route::get('/edit/{edit}', 'FrameQuestionsController@edit')->name('question.edit');
//Route::put('/{update}', 'FrameQuestionsController@update')->name('question.update');
//Route::post('/add', 'FrameQuestionsController@store')->name('question.store');
});
Route::get('/take-quiz/{quizNo}/{attempt?}/{questionNo?}', 'TakeQuizController@displayQuestions')->name('take.quiz');
Route::post('update/{id}', 'FrameQuestionsController@update')->name('update.question');
Route::post('quiz-status/{qId}', 'AdminController@update')->name('confirm.status');
Route::post('timer-status/{qId}', 'AdminController@updateTimer')->name('timer.status');

Route::get('/student-result', 'AdminController@searchStudentResults')->name('studentResult.search');
Route::post('/getUserDetails', 'UserDetailsController@store')->name('student.details');
Route::get('/summary.show/{quizNo}','TakeQuizController@showQuizSummary')->name('summary.show');
// Route::get('/summary.show', function () {
//     $pointsHistory = Session::get('pointsHistory');
//     echo $pointsHistory;
//     return view('quiz-summary',compact('pointsHistory'));
// })->name('summary.show');

Route::resource('question','FrameQuestionsController');
Route::resource('quizNumber','CreateQuizController');
Route::resource('submitQuiz','TakeQuizController');
Route::resource('submitDailyQuiz','DailyChallengeController');

//Image upload,view and delete

Route::post('image/upload/store','FrameQuestionsController@fileStore')->name('image.upload');
Route::post('video/upload/store','FrameQuestionsController@videoStore');
Route::post('image/delete','FrameQuestionsController@fileDestroy');
Route::post('video/delete','FrameQuestionsController@videoDestroy');
Route::get('server/image','FrameQuestionsController@imageFromServer');
Route::get('server/video','FrameQuestionsController@videoFromServer');
Route::get('server/singleimage','FrameQuestionsController@singleImageFromServer');

// Route::post('/images-save', 'UploadImagesController@store');
// Route::post('/images-delete', 'UploadImagesController@destroy');
// Route::get('/images-show', 'UploadImagesController@index');

Route::post('/language','LanguageController@changeLanguage');
// Route::post('/language', array(
// 'before' => 'csrf',
// 'as' => 'language-chooser',
// 'uses' => 'LanguageCOntroller@changeLanguage',

// ));


