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

/*
// dynamic route(give the value into the url)
Route::get('/users/{id}', function($id){
    return 'This is user '.$id;
});
*/

Route::get('/', 'PagesController@index');

Route::resource('users', 'UserController');

Route::post('/login/custom', ['uses'=>'Auth\LoginController@login','as'=>'login.custom']);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // user dashboard

///////////////// Admin-User ///////////////

Route::get('/adminHome', 'AdminHomeController@index')->name('adminHome'); //admin dashboard

Route::get('/indexAdmin', 'AdminUserController@indexUser'); // tab e userave te admini

 Route::post('/admin/indexAdmin', 'AdminUserController@storeUser');  // admin krijon userin
 Route::get('/createUser', 'AdminUserController@createUser');

Route::get('/admin/{admin}/editUser', 'AdminUserController@editUser'); // admin editon profilin e userit
Route::patch('/admin/{admin}', 'AdminUserController@updateUser');

Route::get('/{id}/deleteUser','AdminUserController@destroyUser');  // admin fshin userin


///////////////// User ////////////////////

Route::get('/users/{id}', 'UserController@show')->name('show'); // profili i user

Route::get('/{id}/edit', 'UserController@edit'); // view edit profile e userit-- 

Route::get('/{id}/deleteprofile', 'UserController@destroy'); // butoni qe useri fshin profilin e tij  


///////////// Admin-Dep ///////////////////

Route::get('/indexDep', 'AdminDepController@indexDep'); // datatable e dep

Route::post('/indexDep', 'AdminDepController@storeDep')->name('newDep');  // admin krijon dep
Route::get('/createDep', 'AdminDepController@createDep');

Route::get('/admin/{dep}/editDep', 'AdminDepController@editDep'); // admin editon dep
Route::patch('/{dep}/Dep', 'AdminDepController@updateDep');

Route::get('/{id}/delete','AdminDepController@destroyDep');  // admin fshin dep



///////////////// Data Table //////////////

Route::get('/{dep}/listUsers', 'AdminDepController@listUsers');





////////////////// Chati //////////////////

// vue.js
// Route::get('/chat', function(){
//  return view('chat');
//  });

// //xx
//  Route::get('/chat', 'ChatController@index');

// Route::get('/messages', 'ChatController@show');

// Route::post('/messages', 'ChatController@store');



Route::get('/chat', 'ChatController@index');
Route::get('/messages', 'ChatController@fetchMessages');
Route::post('/messages', 'ChatController@sendMessage');







// Indiani 2
// Route::post('send-message','ChatController@store');  // ne momentin qe drg msg(shtyp send)
// Route::get('/chat/{id}',  'ChatController@callmessage');  //? per marresin
// // Auth::routes();
// Route::get('/message/{id}', 'HomeController@chat')->name('home');  //duhet te dale fq e chatit

// Route::get('/allmessage', 'HomeController@allmessage')->name('home');

// Route::get('/chat', 'HomeController@allmessage');

// Route::get('/json','HomeController@jsonResponse');

// Route::get('/sound','ChatController@soundCheck');

// Route::get('/seen','ChatController@seenMessage');

// Route::get('/seenUpdate','ChatController@seenUpdate');

// Route::get('/allmessageview','ChatController@allMessageView');

// Route::get('/singleSeenUpdate/{id}','ChatController@singleSeenUpdate');

// Route::post('/typing','ChatController@typing');

// Route::get('/deletemessage/{id}','ChatController@deletemessage');

// Route::get('/typing-receve/{id}','ChatController@typinc_receve');

// Route::get('/users',function(){
//     return view('users');
// });







