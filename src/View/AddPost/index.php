<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Ajouter un billet</h2>
        <form action="AddPost/add" method="post">
            <div class="form-group">
                <label for="title">Titre du chapitre</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Votre texte</label>
                <textarea name="content" id="content" cols="30" rows="5"        class="form-control" required></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="published" name="published" class="form-check-input">
                <label for="published" class="form-check-label">Publié</label>
            </div>
            <button class="btn btn-dark" type="submit">Ajouter</button>
        </form>

        <form>
</div>