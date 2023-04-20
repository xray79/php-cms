<?php

// router methods accept different uris, then call the relevant controller and method.
$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('admin', 'PagesController@admin');
// $router->get('admin', 'PagesController@admin');

$router->post('update/home', 'PagesController@updateHome');
$router->post('update/about', 'PagesController@updateAbout');
$router->post('update/contact', 'PagesController@updateContact');
