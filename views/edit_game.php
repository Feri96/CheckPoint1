<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Uprava hry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <?php
    require_once "..\header.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/controllers/GameController.php";
    ?>
</head>

<body>
<?php
$games = [];
$id_game = $_REQUEST["id_game"];
$gameController = new GameController();
try{
    $games = $gameController->selectGameById($id_game);
}catch(Exception $e) {
    echo $e->getMessage();
}
?>
<section class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">Game Oasis
                <img src="/img/1.png" alt="Logo" width="60" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.html">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="zoznam_hier.html">Zoznam hier</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="not_found.html">Prihlásiť</a></li>
                            <li><a class="dropdown-item" href="registracia.html">Zaregistrovať</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Hľadať" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Hľadať</button>
                    </form>
                </div>
            </nav>
        </div>
    </nav>
</section>
<section class="main_body">
    <div class="col-sm-10">
        <div class="center">

            <form action="/servlets/update-game.php" method="post" id="update_form">
                <div class="form-group">
                    <input value = "<?= $id_game ?>" type="hidden" name="id_game" id="id_game" class="form-control">
                </div>
                <h2>Uprav hru</h2>
                <div class="mb-3">
                    <label for="text" class="form-label">Názov hry</label>
                    <input value="<?= $games[0]->getGameName() ?>" type="text" class="form-control" name="game_name" id="game_name">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Žáner</label>
                    <input value="<?= $games[0]->getGenre() ?>" type="text" class="form-control" name="genre" id="genre">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Minimalny vek</label>
                    <input value="<?= $games[0]->getMinAge() ?>" type="number" class="form-control" name="minimal_age" id="minimal_age">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text</label>
                    <input value="<?= $games[0]->getText() ?>" type="text" class="form-control" name="text" id="text">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Dátum vydania</label>
                    <input value="<?= $games[0]->getReleaseDate() ?>" type="text" class="form-control" name="release_date" id="release_date">
                </div>
                <button type="submit" class="btn btn-primary">Edituj</button>
        </div>
    </div>
    </div>
</section>

<section class="footer">
    <div class="row">
        <div class="col-sm-4">
            <h4>Adresa</h4><br><p>Game Oasis s.r.o.<br><br>Vyšehradská <br><br> 851 06 Bratislava</p>
        </div>
        <div class="col-sm-4">
            <h4>Prehľadávanie</h4>
            <ul type="none">
                <li><a href="../index.html"><p>Domov</p></a></li>
                <li><a href="not_found.html"><p>Napoveda</p></a></li>
                <li><a href="registracia.html"><p>Registrácia</p></a></li>
                <li><a href="not_found.html"><p>Prihlasenie</p></a></li>
                <li><a href="not_found.html"><p>Obchodné podmienky</p></a></li>
                <li><a href="database_games.php"><p>Databaza</p></a></li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h4>Kontakt</h4><br><p>Tel: +421 948 432 311 <br><br> frantisek.plutinsky@mail.com</p>
        </div>
    </div>
</section>
<script>
    $( "#update_form" ).validate({
        rules: {
            game_name: {
                required: true,
            },
            genre: {
                required: true,
            },
            minimal_age: {
                required: true,
            },
            text: {
                required: true,
            },
            release_date: {
                required: true,
            }
        }
    });
</script>
</body>
</html>
