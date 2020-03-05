<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Liste des commentaires</h2>
    <table class="table table-striped">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Titre du billet</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Auteur</th>
            <th scope="col">status</th>
            <th scope="col">Commande</th>
        </tr>
        <?php foreach ($comments as $comment) : ?>
        <tr>
            <td scope="row"><?= date('d/m/Y', strtotime($comment['date'])) ?></td>
            <td scope="row"><?= $this->clean($comment['title']) ?></td>
            <td width="70%"><?= $this->clean($comment['content']) ?></td>
            <td scope="row"><?= $this->clean($comment['author']) ?></td>
            <td scope="row"><?= $this->clean($comment['status']) ?></td>
            <td><a href="comment/delete/<?= $this->clean($comment['id']) ?>"><button class="btn btn-primary">Supprimer</button></a></td>
        </tr>
        <?php endforeach ?>
    </table>

</div>