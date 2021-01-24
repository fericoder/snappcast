<?php

// use Shetabit\Payment\Invoice;
// use Shetabit\Payment\Facade\Payment;
Auth::routes();

Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('profile', 'ProfileController@edit')->name('profile.index');;
    Route::post('profile', 'ProfileController@update');
    Route::post('profile/password', 'ProfileController@password');
    Route::post('profile/avatar', 'ProfileController@avatar');

    Route::resource('index', 'DashboardController');
    Route::resource('incomes', 'IncomeController');
    Route::resource('setting', 'SettingController');
    Route::resource('slide', 'SlideController');
    Route::resource('post', 'PostController');
    Route::resource('course', 'CourseController');
    Route::any('course/delete', 'CourseController@destroy');
    Route::post('course/addSection', 'CourseController@addSection')->name('course.addSection');
    Route::post('course/addEpisode', 'CourseController@addEpisode')->name('course.addEpisode');
    Route::any('course/section/delete', 'CourseController@sectionDestroy');
    Route::any('course/episode/delete', 'CourseController@episodeDestroy');
    Route::resource('user', 'UserController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('category', 'CategoryController');
    Route::resource('course_request', 'CourseRequestController');
    Route::resource('roles', 'RoleController');
    Route::resource('socials', 'SocialController');
    Route::resource('permissions', 'PermissionController');
    Route::get('comment/notApproved', 'CommentController@notApproved')->name('comment.notApproved');
    Route::post('comment/delete', 'CommentController@destroy');
    Route::post('post/delete', 'PostController@destroy');
    Route::post('role/delete', 'RoleController@destroy');
    Route::post('social/delete', 'SocialController@destroy');
    Route::post('permission/delete', 'PermissionController@destroy');
    Route::get('comment/approve/{id}/{commentable}', 'CommentController@approve')->name('comment.approve');
    Route::resource('comment', 'CommentController');
    Route::get('/dashboard/ckeditorUpload', 'PostController@ckeditorUpload');
});


Route::get('/', 'IndexController@index')->name('index');
Route::get('/register', 'IndexController@index');


Route::get('posts/{slug}', 'PostController@show');
Route::get('posts', 'PostController@index')->name('index.posts.index');

Route::get('courses/{slug}', 'CourseController@show');
Route::get('coursesPaid/{id}', 'CourseController@id')->name('courses.id');
Route::get('courses', 'CourseController@index')->name('index.courses.index');


Route::get('teachers/{user_id}', 'TeacherController@show');
Route::get('teachers', 'TeacherController@index');


Route::post('/search', 'PostController@search')->name('index.posts.search');


Route::get('category/{category}', 'PostController@category')->name('index.posts.category');

Route::post('comment', 'Dashboard\CommentController@comment')->middleware('auth');
Route::post('/comment/answer', 'Dashboard\CommentController@answer')->middleware('auth');




Route::get('dashboard/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');




Route::get('/payment/{amount}/{courseId}/{userId}', 'PaymentController@payment');
Route::any('/paid/{amount}/{courseId}/{userId}','PaymentController@paid');


