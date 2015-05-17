<?php
class Connection extends PDO{
    protected static $pdo;

    public function __construct() {
        parent::__construct('mysql:host=localhost;dbname=decotonasoi', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public static function getConnection() {
        if(self::$pdo == null) {
            self::$pdo = new self;
        }
        return self::$pdo;
    }

}