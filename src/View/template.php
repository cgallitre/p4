<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <base href="<?= $rootWeb ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $title ?></title>

</head>

<body>
    <div class="container">
        <header class="row">
            <div class="col" id="head">
                <a href="index.php"><h1><?= $title ?></h1></a>
                <img src="img/entete.jpg" class="img-fluid" alt="Illustration du blog de Jean">
            </div>
        </header>
        <section class="row">
            <?= $content ?>
        </section>
        <footer class="row">
            <div class="col jumbotron" id="foot">
                <h4>Qui est Jean Forteroche ?</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio non dolore tempore in exercitationem, ipsa quae quisquam, eaque quas maxime libero? Recusandae amet saepe reprehenderit tempora rerum ducimus, placeat adipisci.
                </p>
            </div>
        </footer>
    </div>

</body>

</html>