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
    'middleware' => ['web', 'ohio.admin']
],
    function () {
        Route::get('{any?}', function () {
            return view('ohio-spot::base.admin.dashboard');
        })->where('any', '(.*)');
    }
);