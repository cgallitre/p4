<?php $this->title = "Le blog de Jean Forteroche" ?>

<div class="col-md-12" id="main">
    <!-- main content -->

        <h2>Administration</h2>
        <form action="backoffice/index" class="jumbotron" method="post">
            <div class="form-group">
                <label for="username">Identifiant</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-dark text-center" type="submit">Se connecter</button>
        </form>

</div>