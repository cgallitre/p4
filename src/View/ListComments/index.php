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
            <th scope="col">Publié</th>
        </tr>
        <?php foreach ($comments as $comment) : ?>
        <tr>
            <td scope="row"><?= $this->clean($comment['date']) ?></td>
            <td scope="row"><?= $this->clean($comment['date']) ?></td>
            <td width="80%"><?= $this->clean($comment['content']) ?></td>
            <th scope="row"><?= $this->clean($comment['author']) ?></th>
            <td><a href="listcomments/delete/<?= $this->clean($comment['id']) ?>"><button class="btn btn-primary">Supprimer</button></a></td>
        </tr>
        <?php endforeach ?>
    </table>

</div>