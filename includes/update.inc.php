<h1>Modifier</h1>

<?php



// dump($select);



if (isset($_POST["frmUpdate"])) {

    $requete = "UPDATE utilisateurs SET nom = '" . $_POST['nom'] . "', prenom = '" . $_POST['prenom'] . "', mail = '" . $_POST['mail'] . "' WHERE id_utilisateur = " . $_POST['id'];
    dump($requete);
    $queryUpdate = new Sql();
    $update = $queryUpdate->inserer($requete);

    // displayMessage("Modification envoyée");
    header('Location: index.php?page=admin');
} else {

    $requete = 'SELECT id_utilisateur, nom, prenom, mail FROM utilisateurs WHERE id_utilisateur = ' . $_GET['id'];
    $querySelect = new Sql();
    $select = $querySelect->recup($requete);

    $nom = $select[0]['nom'];
    $prenom = $select[0]['prenom'];
    $mail = $select[0]['mail'];
    $id = $_GET['id'];

    include "./includes/frmUpdate.php";
    include "./includes/admin.inc.php";
}
