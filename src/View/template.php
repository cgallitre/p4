<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <base href="<?= $rootWeb ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS pour le tuto A supprimer -->
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
            <div class="col" id="foot">
                Pied de page
            </div>
        </footer>
    </div>

</body>

</html>