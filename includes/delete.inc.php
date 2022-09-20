<h1>Supprimer</h1>
<?php

$requete = 'DELETE FROM utilisateurs WHERE id_utilisateur = ' . $_GET['id'];

$queryDelete = new Sql();
$delete = $queryDelete->inserer($requete);

header('Location: index.php?page=admin');
