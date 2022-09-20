<form action="index.php?page=inscription" method="post">
    <div>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" value="<?= $nom ?>">
    </div>
    <div>
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>">
    </div>
    <div>
        <label for="mail">Email : </label>
        <input type="email" name="mail" id="mail" value="<?= $mail ?>">
    </div>
    <div>
        <label for="password1">Mot de passe :</label>
        <input type="password" id="password1" name="password1" />
    </div>
    <div>
        <label for="password2">Mot de passe (vérification) :</label>
        <input type="password" id="password2" name="password2" />
    </div>
    <div>
        <input type="reset" value="Effacer">
        <input type="submit" value="Envoyer">
    </div>
    <input type="hidden" name="frmInscription">
</form>