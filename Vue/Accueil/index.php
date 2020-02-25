<?php $this->titre = "Le blog de Jean Forteroche" ?>

<?php foreach ($billets as $billet) : ?>
    <article class="jumbotron">
        <header>
            <a href="/billet/index/<?= $this->nettoyer($billet['id']) ?>">
                <h3 class="display-4"><?= $this->nettoyer($billet['titre']) ?></h3>
            </a>
            <hr class="my-4">
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?= $this->nettoyer($billet['contenu']) ?></p>
        <p class="lead"><a class="btn btn-dark" href="/billet/index/<?= $this->nettoyer($billet['id']) ?>" role="button">Lire la suite...</a></p>
    </article>

<?php endforeach; ?>