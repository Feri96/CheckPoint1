<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/models/Game.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/controllers/GameController.php";

$game = new Game(
    0,
    $_REQUEST["game_name"],
    $_REQUEST["genre"],
    $_REQUEST["minimal_age"],
    $_REQUEST["text"],
    $_REQUEST["release_date"]
);

$gameController = new GameController();
try {
    $gameController->addGame($game);
    header("Location: /views/database_games.php");
} catch (PDOException $exception) {
    // You can handle the PDOException directly
    throw $exception; // Optionally, rethrow the caught exception
} catch (Throwable $exception) {
    // Catch any other exceptions that may occur
    throw new Exception($exception->getMessage());
}
