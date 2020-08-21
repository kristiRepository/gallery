<?php

$router->get('', 'AlbumController@index');
$router->get('create', 'AlbumController@create');
$router->post('store', 'AlbumController@store');
$router->post('delete', 'AlbumController@delete');
$router->get('album', 'PhotoController@index');
$router->get('photo/create', 'PhotoController@create');
$router->post('photo/store', 'PhotoController@store');
$router->post('photo/delete/', 'PhotoController@delete');
$router->get('slider', 'PhotoController@slider');
