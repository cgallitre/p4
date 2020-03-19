<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Ajouter un chapitre</h2>
        <form action="post/add" method="post" class="jumbotron">
            <div class="form-group">
                <label for="title">Titre du chapitre</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Votre texte</label>
                <textarea name="content" id="content" rows="30" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="excerpt">Résumé (visible sur la page d'accueil)</label>
                <textarea name="excerpt" id="excerpt" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="published" name="published" class="form-check-input">
                <label for="published" class="form-check-label">Publié</label>
            </div>
            <button class="btn btn-dark" type="submit">Ajouter</button>
        </form>
</div>

<!-- tinyMCE -->
<script src="https://cdn.tiny.cloud/1/x0g6ua9j7ztptummsgzbtrr9z5a527zl90lks8noaahcvyhb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#content'
      });
    </script>
