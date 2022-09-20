<?php

class Utilisateur implements interfaceUtilisateur
{
    private string $name;

    public function __construct()
    {
    }

    public function __get($argName)
    {
        echo "La propriété $argName n'existe pas.";
    }

    public function __set($name, $value)
    {
        echo "Vous essayer de mettre la valeur $value à la propriété $name qui n'existe pas.";
    }

    public function __isset($name)
    {
        echo "Vous essayer de vérfier la propriété $name qui n'existe pas.";
    }

    public function __call($methode, $arguments)
    {
        echo "La méthode $methode n'est pas accessible et les arguments passés sont : " . implode('/', $arguments) . ". ";
    }

    public static function __callStatic($methode, $arguments)
    {
        //Même chose que call dans un contexte d'appel de méthode statique
    }

    public function __toString()
    {
        return "Vous tenter d'afficher un objet";
    }

    public function __invoke($arg)
    {
        echo "Vous tentez d'utiliser un objet comme fonction avec pour arguments : $arg.";
    }

    public function __clone()
    {
        //Invoqué lors de l'utilisation du clonage d'objet
    }

    private function verifierUtilisateur($mailUtilisateur): int | false
    {
        $requete = "SELECT id_utilisateur FROM utilisateurs WHERE mail = '$mailUtilisateur'";
        $querySelect = new Sql();
        $tableauRetour = $querySelect->recup($requete);
        if (empty($tableauRetour)) {
            $idUtilisateur = false;
        } else {
            $idUtilisateur = $tableauRetour[0]["id_utilisateur"];
        }
        return $idUtilisateur;
    }

    public function inscrireUtilisateur(
        string $nomUtilisateur,
        string $prenomUtilisateur,
        string $mailUtilisateur,
        string $mdpUtilisateur
    ): bool {

        $verifUtilisateur = $this->verifierUtilisateur($mailUtilisateur);

        if ($verifUtilisateur) {
            displayMessage("Il y a déjà une adresse email existante.");

            return false;
        } else {
            $mdpCrypte = password_hash($mdpUtilisateur, PASSWORD_DEFAULT);
            $requete = "INSERT INTO utilisateurs (nom, prenom, mail, password)
                        VALUES ('$nomUtilisateur', '$prenomUtilisateur', '$mailUtilisateur', '$mdpCrypte');";

            $sql = 'Sql';
            $etat = $sql::inserer($requete);

            return $etat;
        }
    }

    public function modifierUtilisateur()
    {
    }

    public function supprimerUtilisateur()
    {
    }

    public function connecterUtilisateur($mailUtilisateur, $mdpUtilisateur): bool
    {
        $verifUtilisateur = $this->verifierUtilisateur($mailUtilisateur);

        if($verifUtilisateur) {
            $requete = "SELECT password FROM utilisateurs WHERE mail = '$mailUtilisateur';";
            $sql = 'Sql';
            $selectLogin = $sql::recup($requete);

            if (count($selectLogin) > 0) {
                $resultatPassword = $selectLogin[0]['password'];

                if (password_verify($mdpUtilisateur, $resultatPassword)) {
                    return true;
                  }
                  else {
                    return false;
                  }
            }
            return false;
        }
    }

    public function deconnecterUtilisateur()
    {
    }
}
