<?php

use App\Core\App;

App::bind('config', require 'core/database/config.php');

App::bind('database', new QueryBuilder(
    Connection::make(
        App::get('config')['database']
    )
));
