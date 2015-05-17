<?php
class Message {
    public $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function addMessage($id, $message) {
        /*prepare sert à préparé une requête*/
        $requete = $this->connection-> prepare('INSERT INTO messages(login_id, message) VALUES (?, ?)');
        /*execute sert à mettre ce qu'il faut à la place des '?'*/
        $requete->execute(array($id, $message));
    }

    public function getAllMessages() {
        $reponse = $this->connection-> query('SELECT message, login FROM messages INNER JOIN users ON messages.login_id=users.id');
        $donnees = $reponse->fetchAll();

        return $donnees;
    }

    public function getUserByMessage($name) {
        $response = $this->connection-> prepare('SELECT * FROM messages INNER JOIN users ON messages.login_id=users.id WHERE login=?');
        $response->execute(array($name));
        $donnees = $response->fetchAll();

        return $donnees;
    }
}