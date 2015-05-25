<ul>
    <li class="navLiDcas"><a class="linkNav" href="?page=backoffice&action=addStylist">Add Stylist</a></li>
</ul>

<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $actionController = 'vue/'.$routing[$page][$action].'.php';

    if (file_exists($actionController)) {
        require $actionController;
    } else {
        echo 'File is missing';
    }

    if (!isset($routing[$page][$action])) {
        // la page n'existe pas
        $action = '404';
    }
} else {
    //page par defaut
    $action = '';
}