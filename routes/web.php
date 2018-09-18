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


// App::singleton('App\Billing\Stripe', function(){
//     return new \App\Billing\Stripe(config('services.stripe.secret'));
// });

// $stripe = App::make('App\Billing\Stripe');

// dd(resolve('App\Billing\Stripe'));

// Route::get('/', function () {
//     return view('welcome'); 
// });

Route::get('/', 'PostsController@index')->name('home');

Route::get('/posts/create', 'PostsController@create');

Route::post('posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');


Route::get('/posts/tags/{tag}', 'TagsController@index');


Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout','SessionsController@destroy');

//controller => PostsController

//Eloquent model =>Post

//migration => create_posts_table


// GET /posts

// GET /posts/create
 
// POST /posts

// GET /posts/{id}/edit

// GET /posts/{id}

// PATCH /posts/{id}

// DELETE /posts/{id}
