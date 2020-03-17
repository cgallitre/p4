<?php $this->title = "Le blog de Jean Forteroche" ?>

<!-- tinyMCE -->
<script src="https://cdn.tiny.cloud/1/x0g6ua9j7ztptummsgzbtrr9z5a527zl90lks8noaahcvyhb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#content'
      });
    </script>

<div class="col-md-12" id="main">
    <!-- main content -->
    <h2>Modifier un chapitre</h2>
        <form action="post/update" method="post" class="jumbotron">
            <input type="hidden" id="id" name="id" value="<?= $post['id'] ?>">
            <div class="form-group">
                <label for="title">Titre du chapitre</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $this->clean($post['title']) ?>"required>
            </div>
            <div class="form-group">
                <label for="content">Votre texte</label>
                <textarea name="content" id="content" rows="30"><?= $post['content'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="excerpt">Résumé (visible sur la page d'accueil)</label>
                <textarea name="excerpt" id="excerpt" rows="5" class="form-control" required><?= $this->clean($post['excerpt']) ?></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="published" name="published" class="form-check-input" <?= $this->clean($post['published'])?>>
                <label for="published" class="form-check-label">Publié</label>
            </div>
            <button class="btn btn-dark" type="submit">Modifier</button>
        </form>

        <form>
</div>