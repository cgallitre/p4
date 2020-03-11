<?php $this->title = "Le blog de Jean Forteroche" ?>
<div class="col-md-8" id="main">
    <!-- main content -->
    <article class="jumbotron">
        <header>
            <h3 class="display-4"><?= $this->clean($post['title']) ?></h3>
            <time>Publié le <?= date('d/m/Y', strtotime($post['date'])) ?></time>
        </header>
        <br>
        <p><?= $post['content'] ?></p>
    </article>


    <?php // Calcul du nombre de commentaires
        $comments = $comments->fetchAll();
        $numComments = count($comments);
    ?>
    <!-- Si aucun commentaire, aucun affichage -->
    <?php if ($numComments > 0) : ?> 
        <header>
            <h3 class="display-5">Réponses à <?= $this->clean($post['title']) ?></h3>
        </header>
        <?php foreach ($comments as $comment) : ?>
            <hr class="my-4">
            <p>Le <?= date('d-m-Y à H:i', strtotime($comment['date'])) ?> <?= $this->clean($comment['author']) ?> dit : </p>
            <p><?= $this->clean($comment['content']) ?></p>
            <!-- button signal -->
            <form action="post/view/<?= $post['id'] ?>" method="post">
                <input type="hidden" value="<?= $comment['id'] ?>" name="commentId">
                <button class="btn btn-danger">Signaler</button>
            </form>
        <?php endforeach ?>
    <?php endif ?>

    <br>
    
    <div class="form-group" id="ajoutCommentaire">
        <h4>Ajouter un commentaire</h4>
        <?php if(isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['classMessage'] ?>"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']) ?>
        <?php endif ?>
        <form action="post/comment" method="post">
            <input type="text" id="author" name="author" placeholder="Votre pseudo" class="form-control" required><br>
            <textarea name="content" id="content" cols="30" rows="5" placeholder="Votre commentaire" class="form-control" required></textarea><br>
            <input type="hidden" name="id" value="<?= $this->clean($post['id']) ?>">
            <input class="btn btn-dark" type="submit" value="Commenter">
        </form>
    </div>
</div>

<!-- aside -->
<div class="col-md-4">
    <div class="bg-grey p-4 jumbotron" id="aside">
        <div>
            <h2>Sommaire</h2>
            <ul class="list-unstyled">
                <?php foreach ($titlesPosts as $titlePost) : ?>
                    <a href="/post/view/<?= $this->clean($titlePost['id']) ?>">
                        <li><?= $this->clean($titlePost['title']) ?></li>
                    </a>
                <?php endforeach ?>

            </ul>
        </div>
    </div>
</div>