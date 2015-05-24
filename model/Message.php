<?php
class Message {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function addMessage($userId,$stylistId, $message) {
        /*prepare sert à préparé une requête*/
        $requete = $this->connection-> prepare('INSERT INTO messages(id_user, id_stylist, message, date) VALUES (?,?,?,NOW())');
        /*execute sert à mettre ce qu'il faut à la place des '?'*/
        $requete->execute(array($userId, $stylistId, $message));
    }

    public function getStylistByMessages() {
        $reponse = $this->connection-> query('SELECT date, message, login FROM messages INNER JOIN users ON messages.login_id=users.id');
        $donnees = $reponse->fetchAll();

        return $donnees;
    }
}