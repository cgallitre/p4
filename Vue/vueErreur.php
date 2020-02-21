<?php

$titre = 'Mon blog';
ob_start();
echo '<p>Une erreur est survenue : ' . $msgErreur;
$contenu = ob_get_clean();

require 'Vue/gabarit.php';
