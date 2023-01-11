<?php
    $title = 'Réponse à une Préoccupation supprimé';
    ob_start();
?>

    <h1>Suppression effectué</h1>

    <a href="../../homePage/adminHomePage.php">Accueil</a>

<?php
    $content = ob_get_clean();

    require_once('../../../../templates/layout/layout.php');
?>