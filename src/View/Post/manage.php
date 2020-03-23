<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>
        Liste des publications 
        <a href="post/add">
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
                <th scope="col">Titre</th>
                <th scope="col">Publié</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            <?php foreach ($titlesPosts as $titlePost) : ?>
            <?php $titlePost['published'] == 1 ? $status = 'checked' : $status=''; ?>
            <tr>
                <th scope="row"><?= $this->clean($titlePost['id']) ?></th>
                <td width="80%"><?= $this->clean($titlePost['title']) ?></td>
                <td scope="row" class="text-center"><input type="checkbox" <?= $status ?> disabled></td>
                <td><a href="post/update/<?= $this->clean($titlePost['id']) ?>"<button class="btn btn-primary">Modifier</button></a></td>
                <td><a href="post/delete/<?= $this->clean($titlePost['id']) ?>"><button class="btn btn-primary">Supprimer</button></a></td>
            </tr>
            <?php endforeach ?>
        </table>
 
</div>