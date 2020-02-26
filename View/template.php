<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <base href="<?= $rootWeb ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Content/css/bootstrap.min.css">
    <!-- CSS pour le tuto A supprimer -->
    <link rel="stylesheet" href="Content/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <div class="container">
        <header class="row">
            <div class="col" id="head">
                <a href="index.php"><h1><?= $title ?></h1></a>
                <img src="Content/img/entete.jpg" class="img-fluid" alt="Illustration du blog de Jean">
            </div>
        </header>
        <section class="row">
            <div class="col-md-8" id="main">
                <?= $content ?>
                <nav aria-label="Navigation dans les articles">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                    </ul>
                </nav>
            </div>

            <!-- aside -->
            <div class="col-md-4" id="aside">
                <div class="bg-grey p-4">
                    <div>
                        <h2>Sommaire</h2>
                        <ul>
                            <li>Article 1</li>
                            <li>Article 2</li>
                            <li>Article 3</li>
                        </ul>
                    </div>
                    <div class="bg-grey">
                        <h2>Bio</h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem facere hic provident incidunt, magnam quibusdam quaerat labore laudantium et beatae ipsum modi laborum sequi assumenda dicta aut. Nobis, reiciendis modi!</p>
                    </div>
                </div>
            </div>
        </section>
        <footer class="row">
            <div class="col" id="foot">
                Pied de page
            </div>
        </footer>
    </div>

</body>

</html>