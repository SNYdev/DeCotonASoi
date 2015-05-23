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
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <title>Du coton a soie</title>
    <link rel="stylesheet" href="vue/css/default.css">
    <script src="js/jquery-2.1.3.min.js"></script>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if (!isset($routing[$page])) {
            $page = '404';
        }
    }
    else {
        $page = 'home';
    }

    $cssController = './vue/css/' . $routing[$page]['controller'] . '.css';
    $jsController = './vue/script/' . $routing[$page]['controller'] . '.js';

    if (file_exists($cssController)) {
        echo '<link href="' . $cssController . '" type="text/css" rel="stylesheet">';
    } else {
        echo 'File is missing';
    }

    if (file_exists($jsController)) {
        echo '<script language="javascript" src="' . $jsController . '">';
        echo '</script>';
    }
    ?>
</head>
<body>
    
    <img class="motif-wave" alt="motif-wave" src="vue/img/motif-wave.jpg">

    <div class="home-img">
        <img id="img-home" alt="home-img" src="vue/img/home-img.jpg">
        <div class="home-txt">
            <h1>Du coton a soie</h1>
            <br><br>
            <cite>Une lingerie faite par vous et pour vous !</cite>
        </div>   
    </div>
    
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
    
        <div class="mid">
        <img id="logo-payement" alt="logo-payement" src="vue/img/logo-payement.png">
        <div class="logo-txt">
            <b>Payement sécurisé</b>
        </div>   
    </div>
    
    <div class="mid">
        <img id="logo-expedition" alt="logo-expedition" src="vue/img/logo-expedition.png">
        <div class="logo-txt">
            <b>Prélèvement a l'expédition</b>
        </div>   
    </div>
    
    <div class="mid">
        <img id="logo-livraison" alt="logo-livraison" src="vue/img/logo-livraison.png">
        <div class="logo-txt">
            <b>Livraison offerte</b>
        </div>   
    </div>
    
    <div class="mid">
        <img id="logo-changement" alt="logo-changement" src="vue/img/logo-changement.png">
        <div class="logo-txt">
            <b>30 jours pour changer d'avis</b>
        </div>   
    </div>
    
    <br><br>
    
    <div class="bot">
        <div class="left">
            <span class="title">MA COMMANDE</span>
            <br><br>
            <span class="txt"><a class="none" href="#">Suivi de commande</a><br>
                <a class="none" href="#">Frais d’envoi</a><br>
                <a class="none" href="#">Délai de livraison</a><br>
                <a class="none" href="#">Echange et remboursement</a><br>
                <a class="none" href="#">Moyens de paiement</a><br></span>
        </div>

        <div class="right">
            <span class="title">NOUS CONTACTER</span>
            <br><br>
            <span class="txt">06.28.42.93.59<br>
                maeva.gabriel96@gmaiL.com<br></span>
        </div>
            
        <br><br><br><br>
        
        <div class="top">
            <span class="title">SUIVEZ-NOUS</span>
            <br><br>
            <img id="logo-FB" alt="logo-FB" src="vue/img/logo-FB.png">
            <img id="logo-twitter" alt="logo-twitter" src="vue/img/logo-twitter.png">
            <img id="logo-insta" alt="logo-insta" src="vue/img/logo-insta.png">
        </div>       
    </div>
    
    <footer>
            © 2015 Du conton à soie. All Rights Reserved.
    </footer>
    
    <img class="motif-wave" alt="motif-wave" src="vue/img/motif-wave.jpg">
    
</body>
</html>
