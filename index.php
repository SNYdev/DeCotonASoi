<?php
    //affiche les erreurs
    ini_set('error_reporting', E_ALL);

    // démarre la session
    session_start();

    //charge le fichier des fonctions PHP
    require_once 'model/User.php';
    require_once 'model/Message.php';
    require_once 'model/Connection.php';

    $user = new User(Connection::getConnection());
    $message = new Message(Connection::getConnection());

    // Liste blanche, c'est notre routing qui correspont à nos pages
    $routing = [
        'home' => [
            'controller' => 'home',
            'secure' => false,
            ],
        'inscription' => [
            'controller' => 'subscription',
            'secure' => false,
            ],
        'login' => [
            'controller' => 'login',
            'secure' => false,
            ],

        'message' => [
            'controller' => 'message',
            'secure' => true,
            ],
        'logout' => [
            'controller' => 'logout',
            'secure' => true,
            ],
        '404' => [
            'controller' => '404',
            'secure' => false,
            ],
        'profil' => [
            'controller' => 'profil',
            'secure' => true,
            ],
    ];

    // verifions la pertinance de la page en GET
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if (!isset($routing[$page])) {
            // la page n'existe pas
            $page = '404';
        }
    } else {
        //page par defaut
        $page = 'home';
    }

    //check pour la sécurité  : si la page à la clée 'secure' est true et que $_SESSION['name'] n'est pas définis
    if ($routing[$page]['secure'] === true && !isset($_SESSION['user'])) {
        //Met en session un message informatif
        User::addMessageFlash('info', 'Veuillez-vous connecter afin d\'accéder à cette page');

        //redirection
        header("location: index.php?page=login");
        exit;
    }
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery-2.1.3.min.js"></script>
</head>
<body>

    <header>
        <div class="nav">
            <ul>
                <li class="Accueil"><a class="active" href="index.php">Accueil</a></li>
                <li class="Stylistes"><a href="stylistes1.php">Stylistes</a></li>
                
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="?page=profil" title="profil">Profil</a></li>';
                    echo '<li><a href="?page=logout" title="logout">Logout</a></li>';
                } else {
                    echo '<li class="Connexion"><a href="login.php">Connexion</a></li>';
                }
                ?>
                <li class="Contact"><a href="#">Contact</a></li>
            </ul>
            </div>
    </header>

<?php


    // Affiche les flashBag : des messages informatif du genre "votre message a bien été envoyé"
    if (isset($_SESSION['flashBag'])) {
        foreach ($_SESSION['flashBag'] as $type => $flash) {
            foreach ($flash as $key => $message) {
                echo '<div class="'.$type.'" role="'.$type.'" >'.$message.'</div>';
                // un fois affiché le message doit être supprimé
                unset($_SESSION['flashBag'][$type][$key]);
            }
        }
    }

    // Charge la page demandée
    $fileController = 'vue/'.$routing[$page]['controller'].'.php';
    if (file_exists($fileController)) {
        require $fileController;
    } else {
        echo 'File is missing';
    }

?>
</body>
</html>
