<?php
class User {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function addMessageFlash($type, $message) {
        // autorise que 4 types de messages flash
        $types = ['success','error','alert','info'];
        if (!in_array($type, $types)) {
            return false;
        }

        // on vérifie que le type existe
        if (!isset($_SESSION['flashBag'][$type])) {
            //si non on le créé avec un Array vide
            $_SESSION['flashBag'][$type] = [];
        }

        // on ajoute le message
        $_SESSION['flashBag'][$type][] = $message;
    }

    public function countUserByName($name) {
        $request = $this->connection->prepare('SELECT count(*) as nb_user FROM users WHERE login=?');
        $request->execute(array($name));
        $response = $request->fetch();

        return $response;
    }

    public function addUser($firstname, $lastname, $login, $password, $address, $city, $zcode, $email) {
        $requete = $this->connection->prepare('INSERT INTO users(prenom, nom, login, motDePasse, adresse, ville, codePostal, email) VALUES (?,?,?,?,?,?,?,?)');
        $requete->execute(array($firstname, $lastname, $login, sha1($password), $address, $city, $zcode, $email));
    }

    function getUserByName($name) {
        $request = $this->connection->prepare('SELECT * FROM users WHERE login=?');
        $request->execute(array($name));
        $user = $request->fetch();

        return $user;
    }

    public function getUserByNameAndPassword($name, $password) {
        $request = $this->connection->prepare('SELECT * FROM users WHERE login=? AND password=?');
        $request->execute(array($name, sha1($password)));
        $user = $request->fetch();

        return $user;
    }
}