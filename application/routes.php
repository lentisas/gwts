<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/



// View Routes
Route::get('/', array("as" => "home", "uses" => "view@home"));
//Route::get('lmcc', array("as" => "lmcc", "uses" => "view@lmcc"));
Route::get("lmcc_view", array("as" => "lmcc_view","uses" => "view@lmcc"));

//users
Route::post('users',array('uses' => 'main@user'));
Route::put("users/(:num)",array('uses' => 'main@user'));
Route::get('users',array('uses' => 'main@users'));
Route::delete('users/(:num)',array('uses' => 'main@user'));

//companytypes
Route::post('companytypes',array('uses' => 'main@companytype'));
Route::put("companytypes/(:num)",array('uses' => 'main@companytype'));
Route::get('companytypes',array('uses' => 'main@companytypes'));
Route::delete('companytypes/(:num)',array('uses' => 'main@companytype'));

//companies
Route::post('companies',array('uses' => 'main@company'));
Route::put("companies/(:num)",array('uses' => 'main@company'));
Route::get('companies',array('uses' => 'main@companies'));
Route::delete('companies/(:num)',array('uses' => 'main@company'));

//forestdistricts
Route::post('forestdistricts',array('uses' => 'main@forestdistrict'));
Route::put("forestdistricts/(:num)",array('uses' => 'main@forestdistrict'));
Route::get('forestdistricts',array('uses' => 'main@forestdistricts'));
Route::delete('forestdistricts/(:num)',array('uses' => 'main@forestdistrict'));

//lifs
Route::post('lifs',array('uses' => 'main@lif'));
Route::put("lifs/(:num)",array('uses' => 'main@lif'));
Route::get('lifs',array('uses' => 'main@lifs'));
Route::delete('lifs/(:num)',array('uses' => 'main@lif'));

//lifdetails
Route::post('lifdetails',array('uses' => 'main@lifdetail'));
Route::put("lifdetails/(:num)",array('uses' => 'main@lifdetail'));
Route::get('lifdetails',array('uses' => 'main@lifdetails'));
Route::delete('lifdetails/(:num)',array('uses' => 'main@lifdetail'));

//lmccs
Route::post('lmccs',['uses' => 'main@lmcc']);
Route::put("lmccs/(:num)",array('uses' => 'main@lmcc'));
Route::get('lmccs',array('uses' => 'main@lmccs'));
Route::delete('lmccs/(:num)',array('uses' => 'main@lmcc'));

//lmcc_details
Route::post('lmccdetails',array('uses' => 'main@lmccdetail'));
Route::put("lmccdetails/(:num)",array('uses' => 'main@lmccdetail'));
Route::get('lmccdetails',array('uses' => 'main@lmccdetails'));
Route::delete('lmccdetails/(:num)',array('uses' => 'main@lmccdetail'));

//regions
Route::post('regions',array('uses' => 'main@region'));
Route::put("regions/(:num)",array('uses' => 'main@region'));
Route::get('regions',array('uses' => 'main@regions'));
Route::delete('regions/(:num)',array('uses' => 'main@region'));

//species
Route::post('species',array('uses' => 'main@specy'));
Route::put("species/(:num)",array('uses' => 'main@specy'));
Route::get('species',array('uses' => 'main@species'));
Route::delete('species/(:num)',array('uses' => 'main@specy'));

//tifs
Route::post('tifs',array('uses' => 'main@tif'));
Route::put("tifs/(:num)",array('uses' => 'main@tif'));
Route::get('tifs',array('uses' => 'main@tifs'));
Route::delete('tifs/(:num)',array('uses' => 'main@tif'));

//tifdetails
Route::post('tifdetails',array('uses' => 'main@tifdetail'));
Route::put("tifdetails/(:num)",array('uses' => 'main@tifdetail'));
Route::get('tifdetails',array('uses' => 'main@tifdetails'));
Route::delete('tifdetails/(:num)',array('uses' => 'main@tifdetail'));

//tucs
Route::post('tucs',array('uses' => 'main@tuc'));
Route::put("tucs/(:num)",array('uses' => 'main@tuc'));
Route::get('tucs',array('uses' => 'main@tucs'));
Route::delete('tucs/(:num)',array('uses' => 'main@tuc'));

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});