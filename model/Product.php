<?php
class Product {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function addProduct($name, $type, $color, $material, $stylistId) {
        $requete = $this->connection->prepare('INSERT INTO products(nom, type, couleur, matiere, id_styliste) VALUES (?,?,?,?,?)');
        $requete->execute(array($name, $type, $color, $material, $stylistId));
    }
}