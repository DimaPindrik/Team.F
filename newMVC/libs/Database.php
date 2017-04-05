<?php

class Database
{
    public static function getConnection()
    {
        return new PDO(DB_TYPE . ':host=' . DB_HOST .';dbname=' .DB_NAME, DB_USER, DB_PASS);
    }
}