<?php

interface interfaceUtilisateur
{
    public function inscrireUtilisateur(string $nomUtilisateur, string $prenomUtilisateur, string $mailUtilisateur, string $mdpUtilisateur): bool;
    public function modifierUtilisateur();
    public function supprimerUtilisateur();
    public function connecterUtilisateur(string $mailUtilisateur, string $mdpUtilisateur):bool;
    public function deconnecterUtilisateur();
}
