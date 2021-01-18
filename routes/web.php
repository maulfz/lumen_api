<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    //authors routing
    $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => 'AuthorController@create']);
    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);

    //users routing
    $router->get('users',  ['uses' => 'UserController@showAllUsers']);
    $router->get('users/{id}', ['uses' => 'UserController@showOneUser']);
    $router->post('users', ['uses' => 'UserController@create']);
    $router->delete('users/{id}', ['uses' => 'UserController@delete']);
    $router->put('users/{id}', ['uses' => 'UserController@update']);

    //articles routing
    $router->get('articles',  ['uses' => 'ArticleController@showAllArticles']);
    $router->get('articles/{id}', ['uses' => 'ArticleController@showOneArticle']);
    $router->post('articles', ['uses' => 'ArticleController@create']);
    $router->delete('articles/{id}', ['uses' => 'ArticleController@delete']);
    $router->put('articles/{id}', ['uses' => 'ArticleController@update']);

    //published_articles realtime database firebase routing
    $router->get('published_articles',  ['uses' => 'RealtimeFBController@showAllDatas']);
    $router->get('published_articles/{id}', ['uses' => 'RealtimeFBController@showOneData']);
    $router->post('published_articles', ['uses' => 'RealtimeFBController@create']);
    $router->delete('published_articles/{id}', ['uses' => 'RealtimeFBController@delete']);
    $router->put('published_articles/{id}', ['uses' => 'RealtimeFBController@update']);

    //reqres routing
    $router->get('getdata',  ['uses' => 'IntegrationController@showData']);
    $router->post('register', ['uses' => 'IntegrationController@pushRegister']);
    $router->post('login', ['uses' => 'IntegrationController@pushLogin']);
    $router->get('denom',  ['uses' => 'IntegrationController@filterData']);
  });

?>