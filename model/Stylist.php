<?php
class Stylist {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function addStylist($gender, $firstname, $lastname, $password, $address, $city, $zcode, $email, $description, $tel) {
        $requete = $this->connection->prepare('INSERT INTO stylist(sexe, prenom, nom, motDePasse, adresse, ville, codePostal, email, description, telephone) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
        $requete->execute(array($gender, $firstname, $lastname, sha1($password), $address, $city, $zcode, $email, $description, $tel));
    }

    public function getStylistByFirstnameAndLastname($firstname, $lastname) {
        $request = $this->connection->prepare('SELECT * FROM stylist WHERE prenom=? AND nom=?');
        $request->execute(array($firstname, $lastname));
        $user = $request->fetch();

        return $user;
    }
}