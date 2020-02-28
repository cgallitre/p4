<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Ajouter un billet</h2>

    <div class="form-group">
        <form action="AddPost/add" method="post">
            <input type="text" id="title" name="title" placeholder="Titre du billet" class="form-control" required><br>
            <textarea name="content" id="content" cols="30" rows="5" placeholder="Votre texte"
                class="form-control" required></textarea><br>
            <input class="btn btn-dark" type="submit" value="Ajouter">
        </form>
    </div>
</div>