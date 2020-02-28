<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Liste des publications</h2>
    <table class="table table-striped">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        <?php foreach ($titlesPosts as $titlePost) : ?>
        <tr>
            <th scope="row"><?= $this->clean($titlePost['id']) ?></th>
            <td width="80%"><?= $this->clean($titlePost['title']) ?></td>
            <td><button class="btn btn-primary">Modifier</button></td>
            <td><a href="listposts/delete/<?= $this->clean($titlePost['id']) ?>"><button class="btn btn-primary">Supprimer</button></a></td>
        </tr>
        <?php endforeach ?>
    </table>

</div>