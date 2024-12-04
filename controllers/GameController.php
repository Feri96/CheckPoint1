<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/models/Game.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Settings.php";

class GameController
{
    public function addGame(Game $game): bool{
        try {
            $pdo = Settings::getConnection();

            $sql = "INSERT INTO game (game_name,genre,minimal_age,text,release_date)
                    VALUES ( :game_name, :genre, :minimal_age, :text, :release_date)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(":game_name",$game->getGameName());
            $stmt->bindValue(":genre",$game->getGenre());
            $stmt->bindValue(":minimal_age",$game->getMinAge());
            $stmt->bindValue(":text",$game->getText());
            $stmt->bindValue(":release_date",$game->getReleaseDate());

            $stmt->execute();
            return true;
        }catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function selectAllGames(int $limit): array
    {
        $games = [];
        try {
            $pdo = Settings::getConnection();
            $sql = "SELECT * FROM game LIMIT :limit";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);

            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($items as $item) {
                $games[] = new Game($item->id_game, $item->game_name, $item->genre, $item->minimal_age, $item->text, $item->release_date);
            }
            //var_dump($clients);
            return $games;

        } catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function selectGameById(int $id_game): array
    {
        $games = [];
        try {
            $pdo = Settings::getConnection();
            $sql = "SELECT * FROM game WHERE id_game = :id_game";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id_game", $id_game, PDO::PARAM_INT);

            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($items as $item){
                $games[] = new Game($item->id_game, $item->game_name, $item->genre, $item->minimal_age, $item->text, $item->release_date);
            }
            return $games;
        }catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function deleteGame(int $id_game):bool
    {
        try{
            $pdo = Settings::getConnection();
            $sql = "DELETE FROM game WHERE id_game = :id_game";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id_game", $id_game, PDO::PARAM_INT);

            return $stmt->execute();
        }catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public function editClient(Game $game):bool {
        try{
            $pdo = Settings::getConnection();
            $sql = "UPDATE clients SET client_id = :client_id, first_name = :first_name, last_name = :last_name, email = :email, birth_date = :birth_date, city = :city WHERE client_id = :client_id";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(":id_game",$game->getGameId());
            $stmt->bindValue(":game_name",$game->getGameName());
            $stmt->bindValue(":genre",$game->getGenre());
            $stmt->bindValue(":minimal_age",$game->getMinAge());
            $stmt->bindValue(":text",$game->getText());
            $stmt->bindValue(":release_date",$game->getReleaseDate());
            var_dump($game);
            return $stmt->execute();
        }catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }




}
