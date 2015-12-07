<?php


Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@index'
]);

Route::post('/createlist', [
    'as' => 'createList',
    'uses' => 'GiftlistController@postCreateList'
]);

Route::get('/addguest/{list}', [
    'as'    =>  'addGuest',
    'uses'  =>  'GiftlistController@getAddGuest'
]);

Route::post('/addguest/', [
    'as'    =>  'addGuest',
    'uses'  =>  'GiftlistController@postAddGuest'
]);

Route::get('/showguests/{listName}/{activationCode}', [
    'middleware' => 'activated',
    'as'    =>  'guestList',
    'uses'  =>  'GiftlistController@getShowGuestList'
]);

Route::post('/sendlist/', [
    'middleware' => 'activated',
    'as'    =>  'sendlist',
    'uses'  =>  'GiftlistController@postSendList'
]);


