<?php

    $title = 'Mise à jour effectuée avec succès';
    ob_start();
?>

    <h2>Mise à jour du mot de passe effectuée avec succès</h2>

    <p>
        <a href="../../../../../backend/logout/logout.php">Déconnectez-vous</a> pour la prise en compte de la mise à jour
    </p>

<?php
    $content = ob_get_clean();

    require_once('../../../../templates/layout/layout.php');
?>