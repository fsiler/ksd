<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// TODO: CSRF, form protection

Route::get('/', function () {
    return view('app');
});
Route::any('new', function () {
    return ("so you want to add a new thing?");
});
Route::any('edit/{edit}', function ($edit) {
    return ("got edit $edit");
});
?>
