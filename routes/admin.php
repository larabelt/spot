<?php

Route::group([
    'prefix' => 'admin/belt/spot',
    'middleware' => ['web', 'admin']
],
    function () {

        # admin/belt/spot home
        Route::get('{any?}', function () {
            return view('belt-spot::base.admin.dashboard');
        })->where('any', '(.*)');
    }
);