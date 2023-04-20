<?php

// user config file
// allows config changes in an easier way

return [
    'database' => [
        'name' => 'mytodo',
        'username' => 'new-user',
        'password' => 'apple123',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    ]
];
