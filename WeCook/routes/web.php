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

Auth::routes();

Route::get('', function (){
    return redirect('/home');
});

Route::get('login/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\RegisterController@handleProviderCallback');


Route::get('/speciale/all', 'HomeController@regimeSpe');
Route::get('/country/all', 'HomeController@country');
Route::get('/recettes/test', 'RecetteController@indexTest');




Route::get('/special/{id}', 'RecetteController@cate');
Route::get('/country', 'CountryController@index');
Route::get('/recettes/{id}/{name}', 'RecetteController@typePlatIndex');


Route::group(['middleware' => 'auth'], function () {

    Route::get('profile/{id}/listes', 'ListesController@index');
    Route::get('profile/liste/personnaliser/{id}', ['as' => 'userListes', 'uses' => 'ListesController@show']);
    Route::get('profile/liste/{id}', ['as' => 'userTimeline', 'uses' => 'ListesController@showTimeline']);
    Route::get('profile/liste/test/{id}', ['as' => 'userTimelineTest', 'uses' => 'ListesController@showTimeline']);
    Route::get('profile/liste/createList/{id}/{recetteId}', ['as' => 'createList', 'uses' => 'ListesController@createList']);
    Route::get('profile/listIngredients/{id}', ['as' => 'listIngredients', 'uses' => 'ListesController@showIngredients']);
    Route::delete('/friends/destroy/{id}', ['as' => 'friends.destroy', 'uses' => 'FriendController@destroy']);

    Route::post('selectList', 'ListesController@selectList');
    Route::post('switchList', 'ListesController@switchList');
    Route::post('generateLists', 'ListesController@generateLists');
    Route::post('returnRecettes', 'ListesController@returnRecettes');
    Route::get('returnRecettes', 'ListesController@returnRecettes');

    Route::get('profile/liste/{id}/userliste','UserListeController@create');
    Route::post('profile/liste/storeUserliste','UserListeController@store');
    Route::post('profile/liste/validateUserList/{id}','UserListeController@validateUserList');
    Route::delete('/userListe/destroy/{id}', ['as' => 'userListe.destroy','uses' => 'UserListeController@destroy']);
    Route::get('profile/liste/{id}/create', 'ListesController@create');

    Route::post('/mailListe','ListesController@mailListe');
});


Route::post('nameList', 'ListesController@storeNameList');

Route::post('List', 'ListesController@storeListe');

Route::post('ListUpdate/{id}', 'ListesController@updateListe');

Route::post('/recettes/search', 'RecetteController@filterFromHome');

Route::get('/ingredients', 'AlimentController@index');
Route::post('/ingredients', 'AlimentController@filter');

Route::get('/recettes/ingredients', 'RecetteController@filterIngredients');
Route::post('/recettes/ingredients', 'RecetteController@filterIngredients');

Route::get('/recettes/search', 'RecetteController@filterFromHome');

Route::post('/recettes/filter1', 'RecetteController@filter');
Route::get('/recettes/filter1', 'RecetteController@filter');

Route::post('/recettes/filter2', 'RecetteController@filter');
Route::get('/recettes/filter2', 'RecetteController@filter');

Route::post('/recettes/filter3', 'RecetteController@filter');
Route::get('/recettes/filter3', 'RecetteController@filter');

Route::post('/recettes/filter4', 'RecetteController@filter');
Route::get('/recettes/filter4', 'RecetteController@filter');

Route::post('/recettes/filter5', 'RecetteController@filter');
Route::get('/recettes/filter5', 'RecetteController@filter');

Route::get('/home', 'homeController@index');
Route::get('/recettes', 'RecetteController@index');
Route::get('/recettes/{id}', 'RecetteController@show');

Route::delete('/favoris/delete/{id}', 'FavorisController@destroy');
Route::get('/favoris', 'FavorisController@index');


Route::group(['middleware' => 'IsAdmin'], function(){
Route::resource('/admin', 'AdminController');
Route::post('/admin/addCate', 'AdminController@storeIndexCate');
Route::post('/admin/addCountry', 'AdminController@storeCountry');

});

Route::get('profile/{id}/','UserController@show');

Route::delete('/profile/{id}/destroyRegime','ForbidenController@destroy');

Route::post('/profile','UserController@uploadAvatar');

Route::get('/profile/{id}/edit','UserController@edit');

Route::post('/profile/edit/storeRSP','UserController@storeRSP');

Route::post('/profile/edit/storeMM','UserController@storeMM');

Route::post('/profile/edit/storeCAI','UserController@storeCAI');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/friends/add', 'FriendController@create');
    Route::get('/friends/', 'FriendController@index');
    Route::post('/friends/store', 'FriendController@store');
    Route::post('/friends/friendship/{id}', 'FriendController@friendship');

    Route::put('/favoris/create', 'FavorisController@store');
});

Route::get('',function(){
   return Redirect::to('/home');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function ()    {
        // Uses Auth Middleware
    });

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
});
