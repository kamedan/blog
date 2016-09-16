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


Route::group(['middelware' => ['web']], function(){


    Route::get('/', [
    'uses' => 'niceController@getHome',
     'as' => 'home'

]);
});


Route::get('/{action}/{name?}', [
        'uses' => 'niceController@getNiceAction',
        'as' => 'niceAction'
    ]);


Route::post('/add_action', [
    'uses' => 'niceController@postInsertNiceAction',
    'as' => 'add_action'
]);

/*Route::get('/greet/{name?}', function ($name = 'you') {
    return view('actions.greet', ['name' => $name]);
})->name('greet');

Route::get('/hug', function () {
    return view('actions.hug');
})->name('hug');

Route::get('/kiss', function () {
    return view('actions.kiss');
})->name('kiss');
*/
/*
Route::post('/', function (\Illuminate\Http\Request $request) {
    if(isset($request['action']) && $request['name']){
        if(strlen($request['name'])>0){
            return view('actions.nice', ['action' => $request['action'], 'name' => $request['name']]);
        }
        return redirect()->back();
    }
    return redirect()->back();
})->name('benice');
*/