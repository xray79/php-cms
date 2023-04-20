<?php

class Connection
{
    public static function make(array $config)
    {
        // connects to db, returns new PDO instance;
        // accepts an array of values to form a connection string 
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
