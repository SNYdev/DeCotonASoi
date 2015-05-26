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

    public function addUser($gender, $firstname, $lastname, $login, $password, $address, $city, $zcode, $tel, $email, $newsletter) {
        $requete = $this->connection->prepare('INSERT INTO users(sexe, prenom, nom, login, motDePasse, adresse, ville, codePostal, telephone, email, newsletter) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
        $requete->execute(array($gender, $firstname, $lastname, $login, sha1($password), $address, $city, $zcode, $tel, $email, $newsletter));
    }

    public function updateUser($id, $login, $password, $address, $city, $zcode, $email, $newsletter) {
        $requete = $this->connection->prepare('UPDATE users SET login=?, motDePasse=?, adresse=?, ville=?, codePostal=?, email=?, newsletter=? WHERE id=?');
        $requete->execute(array($login, sha1($password), $address, $city, $zcode, $email, $newsletter, $id));
    }

    function getUserByName($name) {
        $request = $this->connection->prepare('SELECT * FROM users WHERE login=?');
        $request->execute(array($name));
        $user = $request->fetch();

        return $user;
    }

    public function getUserByEmailAndPassword($email, $password) {
        $request = $this->connection->prepare('SELECT * FROM users WHERE email=? AND motDePasse=?');
        $request->execute(array($email, sha1($password)));
        $user = $request->fetch();

        return $user;
    }
}