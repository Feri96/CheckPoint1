<?php


//namespace models;

class Game
{
    /**
     * @var int
     */
    private int $id_game;
    /**
     * @var string
     */
    private string $game_name;
    /**
     * @var string
     */
    private string $genre;
    /**
     * @var int
     */
    private int $minimal_age;
    /**
     * @var string
     */
    private string $text;
    /**
     * @var string
     */
    private string $release_date;



    public function __construct(int $id_game, string $game_name, string $genre, int $minimal_age, string $text, string $release_date)
    {
        $this->id_game = $id_game;
        $this->game_name = $game_name;
        $this->genre = $genre;
        $this->minimal_age = $minimal_age;
        $this->text = $text;
        $this->release_date = $release_date;
    }

    /**
     * @return int
     */
    public function getGameId(): int
    {
        return $this->id_game;
    }

    /**
     * @return string
     */
    public function getGameName(): string
    {
        return $this->game_name;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @return string
     */
    public function getMinAge(): int
    {
        return $this->minimal_age;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
    /**
     * @var string
     */

    /**
     * @param int $id_game
     * @param string $game_name
     * @param string $genre
     * @param int $minimal_age
     * @param string $text
     * @param string $release_date
     */

}
