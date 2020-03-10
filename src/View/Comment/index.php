<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Liste des commentaires</h2>
    <?= $_SESSION['message'] ?>
    <table class="table table-striped">
        <tr>
            <th scope="col" class="text-center">Date</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Auteur</th>
            <th scope="col">Actions</th>
        </tr>
        <?php foreach ($comments as $comment) : ?>
        <tr>
            <td width="10%""><?= date('d/m/Y', strtotime($comment['date'])) ?></td>
            <td><?= $this->clean($comment['content']) ?></td>
            <td width="20%"><?= $this->clean($comment['author']) ?></td>
            <td width="10%">
                <a href="comment/valid/<?= $this->clean($comment['id']) ?>" title="Valider"><button class="btn btn-success"> </button></a>
                <a href="comment/delete/<?= $this->clean($comment['id']) ?>" title="Supprimer"><button class="btn btn-danger"> </button></a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

</div>