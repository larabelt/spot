<?php

/**
 * Front
 */
Route::group(['middleware' => ['web']], function () {
    Route::get('pages', function () {
        return view('ohio-core::base.front.home');
    });
});

/**
 * Admin
 */
Route::group([
    'prefix' => 'admin/ohio/spot',
    'middleware' => ['web', 'auth.admin']
],
    function () {
        Route::get('{a?}/{b?}/{c?}', function () {
            return view('ohio-spot::base.admin.dashboard');
        });
    }
);