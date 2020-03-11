<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Ajouter un compte utilisateur</h2>
        <?php if(isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['classMessage'] ?>"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']) ?>
        <?php endif ?>
    <form action="backoffice/inscription" method="post" class="jumbotron">
        <div class="form-group col-6">
            <label for="username">Identifiant</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="form-group col-6">
            <label for="pass">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-group col-6">
            <label for="pass">Confirmer le mot de passe</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control" required>
        </div>
        <div class="form-group col-6">
            <button class="btn btn-dark" type="submit">Créer le compte</button>
        </div>
    </form>
</div>