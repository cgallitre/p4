<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-8" id="main">

    <!-- main content -->

   
    <article class="jumbotron">
        <header>
            <h2 class="display-4 text-center">Billet simple pour l'Alaska</h2>
        </header>
        <hr>
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <a href="/post/view/<?= $this->clean($post['id']) ?>">
                    <h4><?= $this->clean($post['title']) ?></h4>
                </a>
                <p>
                    <?= substr($this->clean($post['content']), 0, 200) . '...' ?>
                </p>
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
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit odio doloremque iure dolor tempora, placeat alias perspiciatis est sit! Odio autem reprehenderit, aliquam animi esse cum quisquam rem ex beatae!</p>
        </div>
    </div>
</div>