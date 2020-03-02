<?php

Route::resource('articles', 'Vanguardkras\LaravelSimpleArticles\Http\Controllers\ArticleController')
    ->middleware('bindings');

Route::get('admin_articles', 'Vanguardkras\LaravelSimpleArticles\Http\Controllers\ArticleController@adminIndex');
