<?php $this->titre = 'Le blog de Jean Forteroche - ' . $this->nettoyer($billet['titre']); ?>

<article class="jumbotron">
    <header>
        <h3 class="display-4"><?= $this->nettoyer($billet['titre']) ?></h3>
        <time><?= $this->nettoyer($billet['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($billet['contenu']) ?></p>
</article>

    <header>
        <h3 class="display-5">Réponses à <?= $this->nettoyer($billet['titre']) ?></h3>
    </header>
    <?php foreach ($commentaires as $commentaire) : ?>
        <p>Le <?= $commentaire['date'] ?> <?= $this->nettoyer($commentaire['auteur']) ?> dit : </p>
        <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
        <hr class="my-4">
    <?php endforeach ?>


<form action="billet/commenter" method="post">
    <input type="text" id="auteur" name="auteur" placeholder="Votre pseudo" required><br>
    <textarea name="contenu" id="contenu" cols="30" rows="5" placeholder="Votre commentaire" required></textarea><br>
    <input type="hidden" name="id" value="<?= $this->nettoyer($billet['id']) ?>">
    <input class="btn btn-dark" type="submit" value="Commenter">
</form>
