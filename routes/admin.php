<?php

Route::group([
    'prefix' => 'admin/ohio/spot',
    'middleware' => ['web', 'auth']
],
    function () {

        # admin/ohio/spot home
        Route::get('{any?}', function () {
            return view('ohio-spot::base.admin.dashboard');
        })->where('any', '(.*)');
    }
);