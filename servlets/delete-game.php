<?php

require_once "../controllers/GameController.php";

$id_game = $_REQUEST["id_game"];
$gameController = new GameController();
if (isset($id_game)) {
    try {
        $gameController->deleteGame((int)$id_game);
        header("Location: /views/database-games.php");
        exit;
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
} else {
    die("Zaznam neexistuje!");
}
