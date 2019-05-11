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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test1/{etablissement}','Etablissements\DashboardController@test');

Route::get('/testAuth', function () {
    return App\Models\Agents_commune::getUsersByCommune(1);
})->name('test');

Auth::routes();	

Route::get('/home', 'HomeController@index')->name('home');
// Route pour les agents de la commune
Route::get('/agent-commune', 'Auth\AgentCommuneController@showLoginForm');
Route::post('/agent-commune', 'Auth\AgentCommuneController@login')->name('login_agent_commune');
Route::name('commune.')->group(function () {
		Route::get('/accueil','Communes\DashboardController@acceuil')->name('accueil');
		Route::get('/etablissements','Communes\DashboardController@getEtablissements')->name('get_etablissements');
		Route::post('/createEtablissment','Communes\DashboardController@createEtablissements')->name('create_etablissement');

		Route::get('/users','Communes\DashboardController@getUsers')->name('get_users');
		Route::post('/createUser','Communes\DashboardController@createUser')->name('create_user');
		Route::post('/updateUser','Communes\DashboardController@updateUSer')->name('update_user');



		Route::resource('/crud_etablissements','EtablissementController');


	});

// Route pourles utilisateur des établissement 
Route::get('/{etablissement}/login', 'Auth\UserEtablissementController@showLoginForm')->name('user_etablissement');
Route::post('/{etablissement}/login', 'Auth\UserEtablissementController@login')->name('login_user_etablissement');

Route::name('etablissement.')->group(function () {
		Route::get('/redirect','Etablissements\DashboardController@index')->name('index');
		Route::get('/{etablissement}/accueil','Etablissements\DashboardController@acceuil')->name('accueil');
		Route::get('/{etablissement}/create','Etablissements\DashboardController@create_declaration')->name('create_declaration');
		Route::post('/{etablissement}/create','DeclarationController@store')->name('create_declaration');
		Route::get('/{etablissement}/edit/{declaration}','Etablissements\DashboardController@edit_declaration')->name('edit_declaration');
		Route::post('/{etablissement}/edit/{declaration}','DeclarationController@store')->name('edit_declaration');
		Route::get('/{etablissement}/send/{declaration}','Etablissements\DashboardController@send_declaration')->name('send_declaration');
		Route::get('/{etablissement}/destoy/{declaration}','Etablissements\DashboardController@destroy_declaration')->name('delete_declaration');

		Route::get('/{etablissement}/users','Etablissements\DashboardController@getUsers')->name('get_users');
		Route::post('/{etablissement}/createUser','Etablissements\DashboardController@createUser')->name('create_user');
		Route::post('/{etablissement}/updateUser','Etablissements\DashboardController@updateUSer')->name('update_user');


	});



Route::get('/{etablissement}', function(App\Models\Etablissement $etablissement){
	return redirect()->route('user_etablissement',$etablissement->slug);
});


