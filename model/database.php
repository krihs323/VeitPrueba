<?php
class Database
{
    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=funsoproni;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}