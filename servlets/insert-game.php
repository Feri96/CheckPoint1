<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/models/Game.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/controllers/GameController.php";

try {
    // Validácia vstupov
    $gameName = htmlspecialchars(trim($_POST["game_name"]));
    $genre = htmlspecialchars(trim($_POST["genre"]));
    $minimalAge = (int) $_POST["minimal_age"];
    $text = htmlspecialchars(trim($_POST["text"]));
    $releaseDate = htmlspecialchars(trim($_POST["release_date"]));

    // Vytvorenie objektu
    $game = new Game(0, $gameName, $genre, $minimalAge, $text, $releaseDate);

    // Pridanie hry do databázy
    $gameController = new GameController();
    $gameController->addGame($game);

    // Presmerovanie na tabuľku
    header("Location: /views/database_games.php");
    exit;
} catch (PDOException $exception) {
    error_log("Database error: " . $exception->getMessage());
    echo "Došlo k chybe pri ukladaní hry. Skúste to znova neskôr.";
} catch (Throwable $exception) {
    error_log("General error: " . $exception->getMessage());
    echo "Došlo k neočakávanej chybe. Kontaktujte administrátora.";
}
