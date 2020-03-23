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
                <a href="/"><h1><?= $title ?></h1></a>
                <img src="img/entete.jpg" class="img-fluid" alt="Illustration du livre de Jean Forteroche">
            </div>
        </header>
        <section class="row">
            <?= $content ?>
        </section>
        <footer class="row">
            <div class="col" id="foot">
                <h5 class="text-center">Copyright Jean Forteroche</h5>
                <p class="small text-center">Librement inspiré de l'auteur Jack London et de son oeuvre "Croc Blanc".<br>Site de démonstration.</p>
                <p class="text-center">
                    <a href="backoffice/index"><button type="button" class="btn btn-light">Administration</button>
                    </a>
                </p>
            </div>
        </footer>
    </div>

</body>

</html>