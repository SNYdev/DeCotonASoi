<?php
class Evaluation {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function showUserEval($userId, $stylistId) {
        $response = $this->connection->prepare('SELECT note FROM notes WHERE id_user=? AND id_stylist=?');
        $response->execute(array($userId, $stylistId));
        $eval= $response->fetch();

        return $eval;
    }

    public function addEval($userId, $stylistId, $note) {
        $response = $this->connection->prepare('INSERT INTO stylist(id_user, id_stylist, note) VALUES (?,?,?)');
        $response->execute(array($userId, $stylistId, $note));
    }

    public function overallEval($stylistId) {
        $response = $this->connection->prepare('SELECT AVG(note) FROM notes GROUP BY id_stylist WHERE id_stylist=?');
        $response->execute(array($stylistId));
        $eval= $response->fetch();

        return $eval;
    }
}