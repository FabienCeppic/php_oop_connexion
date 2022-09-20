<form action="index.php?page=update" method="post">
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
        <input type="text" name="mail" id="mail" value="<?= $mail ?>">
    </div>
    <div>
        <input type="reset" value="Effacer">
        <input type="submit" value="Envoyer">
    </div>
    <input type="hidden" name="frmUpdate">
    <input type="hidden" name="id" value="<?= $id ?>">
</form>