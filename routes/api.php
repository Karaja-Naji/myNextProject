<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->get('blogs', function()
        {
            return response()->json([
                'message' => 'Access to blogs resources granted!'
            ]);
        });

    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });
   $api->group(['middleware' => 'cors'], function(Router $api) {
        $api->get('hello', function() {
            return response()->json([
                'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
            ]);
        });
        $api->resource('users', "App\\Http\\Controllers\\UserController");
        $api->resource('posts', "App\\Http\\Controllers\\PostController");
        $api->resource('products', "App\\Http\\Controllers\\ProductController");
        $api->resource('category', "App\\Http\\Controllers\\CategoriesController");
        $api->resource('orders', "App\\Http\\Controllers\\OrderController");
        $api->get('userPosts/{id}', "App\\Http\\Controllers\\PostController@userPosts");
    });
});
