<?php $this->title = 'Le blog de Jean Forteroche - ' . $this->clean($post['title']); ?>

<article class="jumbotron">
    <header>
        <h3 class="display-4"><?= $this->clean($post['title']) ?></h3>
        <time><?= $this->clean($post['date']) ?></time>
    </header>
    <p><?= $this->clean($post['content']) ?></p>
</article>

    <header>
        <h3 class="display-5">Réponses à <?= $this->clean($post['title']) ?></h3>
    </header>
    <?php foreach ($comments as $comment) : ?>
        <p>Le <?= $comment['date'] ?> <?= $this->clean($comment['author']) ?> dit : </p>
        <p><?= $this->clean($comment['content']) ?></p>
        <hr class="my-4">
    <?php endforeach ?>


<form action="post/comment" method="post">
    <input type="text" id="author" name="author" placeholder="Votre pseudo" class="form-control" required><br>
    <textarea name="content" id="content" cols="30" rows="5" placeholder="Votre commentaire" class="form-control" required></textarea><br>
    <input type="hidden" name="id" value="<?= $this->clean($post['id']) ?>">
    <input class="btn btn-dark" type="submit" value="Commenter">
</form>
