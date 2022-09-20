<h1>Login</h1>

<?php

if (isset($_POST["frmLogin"])) {
  $message = "je viens du formulaire";
  $mail = htmlentities(trim($_POST['mail']));
  $password = htmlentities($_POST['password']);

  $erreurs = array();

  $erreurs = checkErrors([$mail]);
  if (mb_strlen($mail) === 0 || !filter_var($mail, FILTER_VALIDATE_EMAIL))
    array_push($erreurs, "E-mail invalide.");
  if (mb_strlen($password) === 0)
    array_push($erreurs, "Mot de passe incorrect.");

  if (count($erreurs)) {
    $messageErreur = "<ul>";
    for ($i = 0; $i < count($erreurs); $i++) {
      $messageErreur .= "<li>";
      $messageErreur .= $erreurs[$i];
      $messageErreur .= "</li>";
    }
    $messageErreur .= "</ul>";
    echo $messageErreur;
    include "./includes/frmLogin.php";
  } else {
    $login = new Utilisateur();
    $etat = $login->connecterUtilisateur($mail, $password);
    if($etat) {
      $message = "Vous êtes connecté.";
      // $_SESSION['loginUser'] = true;
      $_SESSION['loginUser'] = $mail;
      mail($mail, "sujet", "Vous êtes connecté !");
      $url = $_SERVER['HTTP_ORIGIN'] . dirname($_SERVER['REQUEST_URI']) . "/";
      echo "<p><a href=\"$url\">Revenir à la page d'accueil</a></p>";
      echo redirection($url, 2000);
    } else {
      $message = "Erreur d'authentification.";
    }

    echo $message;
  }
} else {
  $mail = "";
  // $message = "je ne viens pas du formulaire";
  include "./includes/frmLogin.php";
}
// displayMessage($message);
