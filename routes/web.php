<?php

Route::get('/', 'Site\HomeController@index')->name('site');

Route::prefix('painel')->group(function(){

    Route::get('/','Admin\HomeController@index')->name('admin');

    Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@authenticate');

    Route::get('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
    Route::post('register', 'Admin\Auth\RegisterController@register');

    Route::get('profile','Admin\ProfileController@index')->name('profile');
    Route::post('profile','Admin\ProfileController@update');

    Route::get('settings', 'Admin\SettingController@index')->name('settings');
    Route::post('settings/save', 'Admin\SettingController@save')->name('settings.save');

    Route::resource('users', 'Admin\UserController');

    Route::resource('pages', 'Admin\PageController');

    Route::post('del', 'Admin\UserController@del')->name('del');

    Route::post('pages/del', 'Admin\PageController@del')->name('pageDel');

});
