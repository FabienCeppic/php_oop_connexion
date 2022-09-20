<form action="index.php?page=login" method="post">
    <div>
        <label for="nom">Email : </label>
        <input type="text" name="mail" id="mail" value="<?= $mail ?>">
    </div>
    <div>
        <label for="prenom">Mot de passe : </label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="reset" value="Effacer">
        <input type="submit" value="Se connecter">
    </div>
    <input type="hidden" name="frmLogin">
</form>