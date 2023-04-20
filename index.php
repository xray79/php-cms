<?php

// composer autoloads classes so no manual imports need to be done
// bootstrap handles initialisation of app
// connecting to db and returning query builder class, which can then be used
require 'vendor/autoload.php';
require 'core/bootstrap.php';

// because of namespaces, some imports need to be done manually
use App\Core\{Router, Request};

// import controller filename from Router static method
Router::load('routes.php')->direct(Request::uri(), Request::method());
