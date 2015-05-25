<?php
    //affiche les erreurs
    ini_set('error_reporting', E_ALL);

    // démarre la session
    session_start();

    //charge le fichier des fonctions PHP
    require_once 'model/User.php';
    require_once 'model/Message.php';
    require_once 'model/Stylist.php';
    require_once 'model/Evaluation.php';
    require_once 'model/Connection.php';
    require_once 'model/Mail.php';

    $user = new User(Connection::getConnection());
    $message = new Message(Connection::getConnection());
    $stylist = new Stylist(Connection::getConnection());
    $eval = new Evaluation(Connection::getConnection());


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
        'stylistes1' => [
            'controller' => 'stylistes1',
            'secure' => false,
            ],
        'stylistes2' => [
            'controller' => 'stylistes2',
            'secure' => false,
            ],
        'backoffice' => [
            'controller' => 'backoffice',
            'secure' => true,
            'addStylist' => 'addStylist'
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
    <meta name="viewport">
    <title>De coton a soie</title>
    <link rel="stylesheet" type="text/css" href="vue/css/reset.css">
    <link rel="stylesheet" type="text/css" href="vue/css/style.css">
    <link rel="icon" type="image/png" href="vue/img/favicon.png"/>
    <script src="js/jquery-2.1.3.min.js"></script>
<?php
    // Charge le CSS/JS de la page demandée
    $cssController = 'vue/css/' . $routing[$page]['controller'] . '.css';
    $jsController = 'vue/script/' . $routing[$page]['controller'] . '.js';
    if (file_exists($cssController)) {
        echo '<link href="' . $cssController . '" type="text/css" rel="stylesheet">';
    } 
    // else {
    //     echo 'File is missing';
    // }

    if (file_exists($jsController)) {
        echo '<script language="javascript" src="' . $jsController . '">';
        echo '</script>';
    }
?>
</head>
<body>
<div class="main">
    <div class="header">
        <img id="logosHeader" src="vue/img/LOGO-Projet-Transversale.svg" width="100px">
    </div>
        <div class="banner">
            <div class="txtBanner">
                <h1 class="bannerTitle">De Coton à Soie</h1>
                <h2 class="bannerContent">Une lingerie fait par vous et pour vous</h2>
            </div>
        </div>
        <div class="nav">
            <ul class="navUlDcas">
                <li class="navLiDcas"><a class="linkNav" href="?page=home">Accueil</a></li>
                <li class="navLiDcas"><a class="linkNav" href="?page=stylistes1">Nos stylistes</a></li>
                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<li class="navLiDcas"><a class="linkNav" href="?page=logout">Logout</a></li>';
                        echo '<li class="navLiDcas"><a class="linkNav" href="?page=profil">Profil</a></li>';
                    } else {
                        echo '<li class="navLiDcas"><a class="linkNav" href="?page=inscription">Inscription</a></li>';
                        echo '<li class="navLiDcas"><a class="linkNav" href="?page=login">Connexion</a></li>';
                    }
                    if(isset($_SESSION['user']) && ($_SESSION['user']['name'] === "admin")) {
                        echo '<li class="navLiDcas"><a class="linkNav" href="?page=backoffice">Backoffice</a></li>';
                    }
                ?>
                <li class="navLiDcas"><a class="linkNav" href="?page=home">Contact</a></li>
            </ul>
        </div>

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
    <script type="text/javascript">
    </script>
</body>
</html>
