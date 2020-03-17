<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>
        Liste des comptes
        <a href="backoffice/inscription">
            <button class="btn btn-primary">Ajouter</button>
        </a>
    </h2>
    <?php if(isset($_SESSION['message'])) : ?>
           <div class="alert alert-<?= $_SESSION['classMessage'] ?>"><?= $_SESSION['message'] ?></div>
           <?php unset($_SESSION['message']) ?>
    <?php endif ?>
    <table class="table table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col" width="75%">Nom</th>
            <th scope="col">Actions</th>
        </tr>
        <?php foreach ($accounts as $account) : ?>
        <tr>
            <th scope="row"><?= $this->clean($account['id']) ?></th>
            <td><?= $this->clean($account['username']) ?></td>

            <?php if ($account['id'] != 1) : ?>
                <td><a href="backoffice/deleteAccount/<?= $this->clean($account['id']) ?>"><button class="btn btn-primary">Supprimer</button></a></td>
            <?php endif; ?>

        </tr>
        <?php endforeach ?>
    </table>

</div>