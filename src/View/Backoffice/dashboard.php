<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-8" id="main">
    <!-- main content -->
        <h2>Tableau de bord</h2>
        <?php if(isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['classMessage'] ?>"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']) ?>
        <?php endif ?>
        <div class="jumbotron">
            <p><a href="post/manage">Gérer les chapitres</a></p>
            <p><a href="comment/index">Modérer les commentaires</a></p>
            <p><a href="backoffice/accounts">Gérer les comptes</a></p>
            <a href="backoffice/logout"><button class="btn btn-light">Se déconnecter</button></a>
        </div>
</div>
<!-- aside -->
<div class="col-md-4">
    <h2>Statistiques</h2>
    <div class="jumbotron" id="aside">
            <p><?= $postsPublished[0]; ?> chapitres publié(s)</p>
            <p><?= $postsInProgress[0]; ?> chapitre(s) en cours</p>
            <p><?= $signaledComments[0]; ?> commentaire(s) à modérer</p>
    </div>
</div>