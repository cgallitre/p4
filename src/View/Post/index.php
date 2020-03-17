<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-8" id="main">

    <!-- main content -->

   
    <article class="jumbotron">
        <header>
            <h2 class="display-4 text-center">Billet simple pour l'Alaska</h2>
        </header>
        
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <a href="/post/view/<?= $this->clean($post['id']) ?>">
                <hr>
                    <h4><?= $this->clean($post['title']) ?></h4>
                </a>
                <div><?= $this->clean($post['excerpt']) . '...' ?></div>
                <br>
                <a href="/post/view/<?= $this->clean($post['id']) ?>">
                    <button class="btn btn-light">Lire la suite...</button>
                </a>
            </div>
        <?php endforeach; ?> 
    </article> 
    

</div>
<!-- aside -->
<div class="col-md-4">
    <div class="jumbotron" id="aside">
        <div>
            <h3>Jean Forteroche</h3>
            <p>Jean Forteroche, né John Griffith Chaney le 12 janvier 1954 à San Francisco, est un écrivain américain dont les thèmes de prédilection sont l'aventure et la nature sauvage.
            <p>
            Il est l'auteur de L'Appel de la forêt et d'autres romans célèbres (Croc-Blanc, Le Talon de fer), dont certains (Martin Eden, Le Cabaret de la dernière chance) auto-biographiques, ainsi que plus de deux cents nouvelles.</p>
            <p>Il est l'un des premiers Américains à faire fortune dans la littérature.</p>
            <p>Jean Forteroche vit à Oakland puis à Piedmont. Il habite dans le quartier d'Oxford lors de sa jeunesse à Piedmont. </p>
        </div>
    </div>
</div>