<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Databaza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php
    require_once "..\header.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/controllers/GameController.php";
    ?>

    <link rel="stylesheet" href="../style.css">

</head>

<body>

<?php
$games = [];
$gameController = new GameController();
try{
    $games = $gameController->selectAllGames(50);
}catch(Exception $e) {
    echo $e->getMessage();
}
?>

<section class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Game Oasis
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
    <div class="center">
        <div class="container">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th>Game Id</th>
                    <th>Názov</th>
                    <th>Žáner</th>
                    <th>Min vek</th>
                    <th>Text</th>
                    <th>Dátum vydania</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <?php
                foreach ($games as $game):
                    ?>
                    <tbody>
                    <tr>
                        <td> <?= $game->getGameId()  ?></td>
                        <td> <?= $game->getGameName()  ?></td>
                        <td> <?= $game->getGenre() ?></td>
                        <td> <?= $game->getMinAge()  ?> </td>
                        <td> <?= $game->getText()  ?> </td>
                        <td> <?= $game->getReleaseDate()  ?> </td>
                        <td> <a class="btn btn-warning" href="/views/edit_game.php?id_game=<?=$game->getGameId()?>">Update</a> </td>
                        <td> <a class="btn btn-danger" href="/servlets/delete-game.php?id_game=<?=$game->getGameId() ?>">Delete</a> </td>
                    </tr>
                    </tbody>
                <?php
                endforeach;
                ?>
            </table>
        </div>
        <a class="btn btn-primary" href="/views/add_game.php">Pridaj</a>
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
</body>
</html>
