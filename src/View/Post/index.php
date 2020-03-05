<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-8" id="main">
    <!-- main content -->
    <?php foreach ($posts as $post) : ?>
    <article class="jumbotron">
        <header>  
            <h3 class="display-4"><?= $this->clean($post['title']) ?></h3>
            <hr class="my-4">
            <time>Publié le <?= date('d-m-Y', strtotime($post['date'])) ?></time>
        </header>
        <p><?= $this->clean($post['content']) ?></p>
        <p class="lead"><a class="btn btn-dark" href="/post/view/<?= $this->clean($post['id']) ?>" role="button">Lire
                la suite...</a></p>
    </article>

    <?php endforeach; ?>

    <!-- Pagination -->
    <nav aria-label="Navigation dans les articles">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
        </ul>
    </nav>
</div>
<!-- aside -->
<div class="col-md-4">
    <div class="bg-grey p-4" id="aside">
        <div>
            <!-- En fonction de la session utilisateur -->
            <h2>Commandes</h2>
            <ul class="list-unstyled">
                <li><a href="/post/add">Ajouter un billet</a></li>
                <li><a href="/post/manage">Modifier un billet</a></li>
                <li><a href="/listComments/index">Modérer les commentaires</a></li>
            </ul>
            <!-- Fin session utilisateur -->
            <h2>Sommaire</h2>
            <ul class="list-unstyled">
                <?php foreach ($titlesPosts as $titlePost) : ?>
                   <a href="/post/index/<?= $this->clean($titlePost['id']) ?>">
                        <li><?= $this->clean($titlePost['title']) ?></li>
                    </a>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>