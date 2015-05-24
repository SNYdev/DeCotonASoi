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
    <title>Du coton a soie</title>
    <link rel="stylesheet" type="text/css" href="vue/css/reset.css">
    <link rel="stylesheet" type="text/css" href="vue/css/style.css">
    <script src="js/jquery-2.1.3.min.js"></script>
<?php
    // Charge le CSS/JS de la page demandée
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
    <div class="main">
        <div class="header">
        </div>
        <div class="banner">
            <div class="txtBanner">
                <h1 class="bannerTitle">De Coton à Soie</h1>
                <h2 class="bannerContent">Une lingerie fait par vous et pour vous</h2>
            </div>
        </div>
        <div class="nav">
            <ul class="navUlDcas">
                <li class="navLiDcas"><a class="linkNav" href="">Accueil</a></li>
                <li class="navLiDcas"><a class="linkNav" href="">Stylistes</a></li>
                <li class="navLiDcas"><a class="linkNav" href="">Connexion</a></li>
                <li class="navLiDcas"><a class="linkNav" href="">Contact</a></li>
            </ul>
        </div>
        <div class="tutoWebsite">
            <ul class="listTuto">
                <li><img class="imgTuto" src="vue/img/tuto1.jpg"></li>
                <li><img class="imgTuto" src="vue/img/tuto2.jpg"></li>
                <li><img class="imgTuto" src="vue/img/tuto3.jpg"></li>
                <li><img class="imgTuto" src="vue/img/tuto4.jpg"></li>
            </ul>
        </div>
        <div class="stylist">
            <div class="txtStylist">
                <h1 class="titleStylist">Nos stylistes</h1>
                <h2 class="subTitleStylist">Meet the team</h2>
                <p class="areaTxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis blandit, arcu et tempus aliquam, felis massa semper mi, at vestibulum nisl lorem a sem. Donec libero sem, tincidunt sed feugiat eget, lobortis vitae erat. Aliquam pulvinar velit vel feugiat tempor. Etiam diam risus, eleifend sed ornare sit amet, cursus nec orci. Suspendisse sollicitudin leo vitae quam feugiat pharetra. Pellentesque interdum, </p>
            </div>
            <div class="imgStylist">
            </div>
        </div>
        <div class="information">
            <div class="imgInformation">
            </div>
            <div class="txtInformation">
                <h1 class="titleInformation">Qui somme-nous ?</h1>
                <h2 class="subTitleInformation">Spécialiste dans le domaine de lingerie personnalisée.</h2>
                <p class="areaTxtInformation">Nous mettons à votre disposition une équipe de styliste avec des styles divers et variés :
                Choisissez le styliste qui colle le plus à votre style, il vous aidera à concevoir votre lingerie.<br>
                Rentrez vos mesures, votre lingerie vous ira comme un gant.<br>
                Personnalisez votre lingerie, elle sera unique au monde</p>
            </div>
        </div>
        <div class="membership">
        </div>
        <div class="begin">
            <div class="contentBegin">
                <div class="txtBegin">
                    <h1 class="titleBegin">Pret pour commencer l'aventure ?</h1>
                    <h2 class="subTitleBegin">Pour créer votre lingerie, laissez vous guider par nos etapes</h2>
                </div>
                <input type="button" class="buttonBegin" value="A toi de jouer !">
            </div>
        </div>
        <div class="footer">
            <div class="mainFooter">
                <div class="iconeDCAS">
                    <div class="iconeIMG">
                        <img src="vue/img/logo-payement.png" width='70px'>
                        <p class="iconeTxt" id="Psecurity">Paiement securisé</p>
                    </div>
                    <div class="iconeIMG">
                        <img src="vue/img/logo-livraison.png" width='70px'>
                        <p class="iconeTxt" id="Pexpedition">Paiement à l'expedition</p>
                    </div>
                    <div class="iconeIMG">
                        <img src="vue/img/logo-expedition.png" width='90px'>
                        <p class="iconeTxt" id="Poffer">Livraison offerte</p>
                    </div>
                    <div class="iconeIMG">
                        <img src="vue/img/logo-changement.png" width='50px'>
                        <p class="iconeTxt" id="Pdays">30 jours pour changer d'avis</p>
                    </div>
                </div>
                <div id="barre">
                </div>
                <div class="moreInformation">
                    <div class="contactInformation">
                        <h1 class="h1Information">Ma commande<br></h1>
                        <ul class="liInformation">
                            <li><a class="linkFooter" href="">Suivi de commande</a></li>
                            <li><a class="linkFooter" href="">Frais d'envoie</a></li>
                            <li><a class="linkFooter" href="">Délai de livraison</a></li>
                            <li><a class="linkFooter" href="">Echange et remboursement</a></li>
                            <li><a class="linkFooter" href="">Moyen de paiement</a></li>
                        </ul>
                    </div>
                    <div class="contact">
                        <h1 class="h1Information">Nous contacter</h1>
                        <ul class="liInformation">
                            <li>06.28.42.93.59</li>
                            <li>maeva.gabriel96@gmail.com</li>
                        </ul>
                    </div>
                    <div class="socialNetwork">
                        <h1 class="h1Information" id="followBlock">Suivez-Nous</h1>
                        <div class="contactIcone">
                            <img src="vue/img/facebook-icon-flat.png" width="40px">
                            <img src="vue/img/logo-Twitter.png" width="40px">
                            <img src="vue/img/logo-insta.jpg" width="40px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>              
<?php
                // Lien cachés si le visiteur n'est pas connecté
                // if (isset($_SESSION['user'])) {
                //     echo '<li><a href="?page=profil" title="profil">Profil</a></li>';
                //     echo '<li><a href="?page=logout" title="logout">Logout</a></li>';
                // } else {
                //     echo '<li class="Connexion"><a href="login.php">Connexion</a></li>';
                // }
?>
<?php


    // Affiche les flashBag : des messages informatif du genre "votre message a bien été envoyé"
    // if (isset($_SESSION['flashBag'])) {
    //     foreach ($_SESSION['flashBag'] as $type => $flash) {
    //         foreach ($flash as $key => $message) {
    //             echo '<div class="'.$type.'" role="'.$type.'" >'.$message.'</div>';
    //             // un fois affiché le message doit être supprimé
    //             unset($_SESSION['flashBag'][$type][$key]);
    //         }
    //     }
    // }

    // // Charge la page demandée
    // $fileController = 'vue/'.$routing[$page]['controller'].'.php';
    // if (file_exists($fileController)) {
    //     require $fileController;
    // } else {
    //     echo 'File is missing';
    // }
?>
    
</body>
</html>
