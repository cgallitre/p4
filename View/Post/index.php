<?php $this->title = 'Le blog de Jean Forteroche - ' . $this->clean($post['title']); ?>
<div class="col-md-8" id="main">
    <!-- main content -->
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
        <input type="text" id="author" name="author" placeholder="Votre pseudo" required><br>
        <textarea name="content" id="content" cols="30" rows="5" placeholder="Votre commentaire"
            required></textarea><br>
        <input type="hidden" name="id" value="<?= $this->clean($post['id']) ?>">
        <input class="btn btn-dark" type="submit" value="Commenter">
    </form>
</div>
<!-- aside -->
<div class="col-md-4" id="aside">
    <div class="bg-grey p-4">
        <div>
            <h2>Sommaire</h2>
            <ul class="list-unstyled">
                <?php foreach ($titlesPosts as $titlePost) : ?>
                <li><?= $titlePost['title'] ?></li>
                <?php endforeach ?>

            </ul>
        </div>
        <div class="bg-grey">
            <h2>Bio</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem facere hic provident incidunt,
                magnam quibusdam quaerat labore laudantium et beatae ipsum modi laborum sequi assumenda dicta aut.
                Nobis, reiciendis modi!</p>
        </div>
    </div>
</div>