<?php

class Database
{

    public static function getInstance()
    {
        return new PDO('mysql:dbname=tienda_mvc_prueba;host=localhost', 'root', '');
    }
}
