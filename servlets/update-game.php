<?php

require_once "../models/Game.php";
require_once "../controllers/GameController.php";

if(isset($_REQUEST["game_name"]) && isset($_REQUEST["genre"]) && isset($_REQUEST["minimal_age"]) && isset($_REQUEST["text"]) && isset($_REQUEST["release_date"])) {
    $game = new Game($_REQUEST["id_game"], $_REQUEST["game_name"],
        $_REQUEST["genre"], $_REQUEST["minimal_age"], $_REQUEST["text"], $_REQUEST["release_date"]);
    $gameController = new GameController();
    var_dump($game);
    try {
        $gameController->editGame($game);
        header("Location: /views/database_games.php");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}else {
    die("Nesprávne parametre!");
}
