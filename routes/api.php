<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('subscribe/{topic}', 'SubscriptionController@subscribe');

Route::post('publish/{topic}', 'SubscriptionController@publish');
