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

class Mail
{
    protected $mail = 'snydesign75@gmail.com';
    protected $subject = 'Transversale';
    protected $message = 'Message';
    protected $header = 'From:"De Coton à Soie" <snydesign75@gmail.com>';
    protected $r = "\r\n";

    function __construct(){
        if (isset($_POST['nickname'])) {
            $testMail = mail($this->mail, $this->subject, $this->message);
            if ($testMail === true) {
                echo "Message envoyé";   
            } else {
                echo "Probleme technique";
            }
        }   
    }
}
