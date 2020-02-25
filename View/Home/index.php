<?php $this->title = "Le blog de Jean Forteroche" ?>

<?php foreach ($posts as $post) : ?>
    <article class="jumbotron">
        <header>
            <a href="/post/index/<?= $this->clean($post['id']) ?>">
                <h3 class="display-4"><?= $this->clean($post['title']) ?></h3>
            </a>
            <hr class="my-4">
            <time><?= $post['date'] ?></time>
        </header>
        <p><?= $this->clean($post['content']) ?></p>
        <p class="lead"><a class="btn btn-dark" href="/post/index/<?= $this->clean($post['id']) ?>" role="button">Lire la suite...</a></p>
    </article>

<?php endforeach; ?>