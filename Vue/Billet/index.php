<?php $this->titre = 'Mon blog - ' . $this->nettoyer($billet['titre']); ?>

<article>
    <header>
        <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
        <time><?= $this->nettoyer($billet['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($billet['contenu']) ?></p>
</article>
<hr>
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire) : ?>
    <p><?= $commentaire['auteur'] ?> dit : </p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach ?>

<form action="billet/commenter" method="post">
    <input type="text" id="auteur" name="auteur" placeholder="Votre pseudo" required><br>
    <textarea name="contenu" id="contenu" cols="30" rows="5" placeholder="Votre commentaire" required></textarea><br>
    <input type="hidden" name="id" value="<?= $billet['id'] ?>">
    <input type="submit" value="Commenter">
</form>