<?php

    $title = 'Suppression effectuée';
    ob_start();
?>

<h2>
    Votre compte viens d'être supprimé. <br >
    Vous pouvez dorénavant <a href="../../userRegistration/registration.php">Créer un nouveau compte</a> pour naviguer dans le forum
</h2>

<p>
    Retour à la <a href="../../../../../index.php">page d'accueil</a>
</p>

<?php
    $content = ob_get_clean();

    require_once('../../../../templates/layout/layout.php');
?>