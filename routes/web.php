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

// asset()やurl()をhttpsで生成
if(config('app.env') === 'production'){
    URL::forceScheme('https');
}

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

// 学生登録フォーム
Route::get('/user/regist_form', 'UserController@userRegistForm');
Route::post('/user/regist', 'UserController@userRegist');

// 管理ページ
Route::group(['middleware' => ['userlogin']], function() {

    Route::get('/', 'UserController@index');

    // 学生管理
    Route::get('/user', 'UserController@index');
    Route::get('/user/detail_user/{id}', 'UserController@detailUserData');
    Route::post('/user/user_status_edit', 'UserController@userStatusEdit');
    Route::post('/user/interview_regist', 'UserController@interviewRegist');

    // 求人管理
    Route::get('/offer', 'InternOfferController@index');
    Route::get('/offer/detail_offer/{id}', 'InternOfferController@detailOfferData');
    Route::post('/offer/offer_status_edit', 'InternOfferController@offerStatusEdit');
    Route::get('/offer/regist_form', 'InternOfferController@offerRegistForm');
    Route::post('/offer/regist', 'InternOfferController@offerRegist');

    // PDF関連
    Route::get('/pdf/user/{id}', 'PdfController@userPdf');
    Route::get('/pdf/offer/{id}', 'PdfController@offerPdf');
    Route::post('/pdf/upload/{id}', 'PdfController@pdfUpload');
    route::get('/pdf/webcab_show', 'PdfController@pdf_webcab_chow');

    // 管理者関連
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/regist_form/{id?}', 'AdminController@adminRegistForm');
    Route::post('/admin/regist', 'AdminController@adminRegist');
    Route::post('/admin/delete', 'AdminController@adminDelete');

});
