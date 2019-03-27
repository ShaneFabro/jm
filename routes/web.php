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


Route::get('/',  [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);

Route::get('/download/{file}', 'DownloadsController@download');

Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//EVENTS AND UPDATES
Route::get('/events','EventController@event')->name('events');
Route::get('/events/sort/{id}','EventController@sortevent')->name('event_sort');
Route::get('/events/{id}','EventController@eventview')->name('event_view');
Route::post('/events/search','EventController@searchevent')->name('searchevent');
//JOBS
Route::get('/jobs','JobController@job')->name('jobs');
Route::get('/jobs/{id}','JobController@jobview')->name('job_view');
Route::post('/jobs/search','JobController@searchjob')->name('searchjob');
//COLLEGE
Route::get('/jobs/college/{id}','CollegeController@college')->name('college');
Route::get('/jobs/college/course/{id}','CollegeController@course')->name('course');
//RESUME CLINIC
Route::resource('/submission','StudentSubmissionController');
//ADMIN
Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', [
        'uses' => 'Admin\AdminPageController@index',
        'as' => 'indexadmin'
    ]);

    Route::get('/admin/settings', [
        'uses' => 'Admin\AdminSettingsController@index',
        'as' => 'settings.index'
    ]);

    Route::post('/admin/settings/update', [
        'uses' => 'Admin\AdminSettingsController@update',
        'as' => 'settings.update'
    ]);

    Route::get('/admin/rubric/createcategory', [
        'uses' => 'Admin\AdminRubricsController@createcategory',
        'as' => 'rubric.createcategory'
    ]);
    Route::post('/admin/rubricc/', [
        'uses' => 'Admin\AdminRubricsController@storecategory',
        'as' => 'rubric.storecategory'
    ]);
    Route::get('admin/users/trashed', [
        'uses' => 'Admin\AdminUsersController@trashed',
        'as' => 'users.trashed'
    ]);
    Route::get('admin/users/restore/{id}', [
        'uses' => 'Admin\AdminUsersController@restore',
        'as' => 'users.restore'
    ]);

    Route::get('admin/users/kill/{id}', [
        'uses' => 'Admin\AdminUsersController@kill',
        'as' => 'users.kill'
    ]);

    Route::resource('admin/users', 'Admin\AdminUsersController');
    Route::resource('admin/colleges', 'Admin\AdminCollegesController');
    Route::resource('admin/categories', 'Admin\AdminCategoriesController');
    Route::resource('admin/rubric', 'Admin\AdminRubricsController');
    Route::resource('admin/courses', 'Admin\AdminCoursesController');
    
});
//COUNSELOR
Route::group(['middleware'=>'counselor'], function(){

    Route::get('/counselor', [
        'uses' => 'Counselor\CounselorPageController@index',
        'as' => 'indexcounselor'
    ]);

    Route::get('counselor/announcements/trashed', [
        'uses' => 'Counselor\CounselorAnnouncementsController@trashed',
        'as' => 'announcements.trashed'
    ]);

    Route::get('counselor/announcements/restore/{id}', [
        'uses' => 'Counselor\CounselorAnnouncementsController@restore',
        'as' => 'announcements.restore'
    ]);

    Route::get('counselor/announcements/kill/{id}', [
        'uses' => 'Counselor\CounselorAnnouncementsController@kill',
        'as' => 'announcements.kill'
    ]);
    
    Route::get('counselor/evaluation/{id}', [
        'uses' => 'Counselor\CounselorEvaluationController@evaluate',
        'as' => 'evaluation.evaluate'
    ]);
    Route::get('counselor/assessed', [
        'uses' => 'Counselor\CounselorEvaluationController@assessed',
        'as' => 'assessed.index'
    ]);
    Route::get('counselor/assessed/summary/{id}', [
        'uses' => 'Counselor\CounselorEvaluationController@summary',
        'as' => 'assessed.summary'
    ]);
    Route::get('counselor/assessed/kill/{id}', [
        'uses' => 'Counselor\CounselorEvaluationController@kill',
        'as' => 'assessed.kill'
    ]);
    Route::get('counselor/jobs/trashed', [
        'uses' => 'Counselor\CounselorJobsController@trashed',
        'as' => 'jobs.trashed'
    ]);
    Route::get('counselor/jobs/restore//{id}', [
        'uses' => 'Counselor\CounselorJobsController@restore',
        'as' => 'jobs.restore'
    ]);

    Route::get('counselor/jobs/kill/{id}', [
        'uses' => 'Counselor\CounselorJobsController@kill',
        'as' => 'jobs.kill'
    ]);
    Route::get('counselor/markAsRead', function(){
        auth()->user()->unreadNotifications->markAsRead();
    });



    Route::resource('counselor/announcements', 'Counselor\CounselorAnnouncementsController');
    Route::resource('counselor/evaluation', 'Counselor\CounselorEvaluationController');
    Route::resource('counselor/jobs', 'Counselor\CounselorJobsController');
    
    // Route::resource('counselor/colleges', 'Counselor\CounselorCollegesController');
    
});