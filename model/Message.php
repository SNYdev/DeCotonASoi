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

class PooMail
{
    // Mail du destinataire
    protected $mail = 'snydesign75@gmail.com';
    protected $subject = 'Transversale';
    protected $message = 'Message';
    protected $header = 'From:"De Coton à Soie" <snydesign75@gmail.com>';
    protected $r = "\r\n";

    protected function subscriptionMail(){
        // Titre du Mail
        $this->subject = 'Votre inscription';
        // Message du Mail
        $this->message = 'Message pour votre inscription';
        // Condition pour empecher l'envois auto
        if (isset($_POST['nickname'])) {
            $testMail = mail($this->mail, $this->subject, $this->message);
                if ($testMail === true) {
                    echo "Message envoyé";   
                } else {
                    echo "Probleme technique";
                }
        }   
    }

    protected function newsletterMail(){
        $this->subject = 'Votre newsletter';
        $this->message = 'Message pour la newsletter';
        if (isset($_POST['nickname'])) {
            $testMail = mail($this->mail, $this->subject, $this->message);
                if ($testMail === true) {
                    echo "Message envoyé";
                } else {
                    echo "Probleme technique";
                }
        }
    }

    protected function buyMail(){
        $this->subject = 'Votre achat';
        $this->message = 'Message pour votre achat';
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
