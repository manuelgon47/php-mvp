<?php

/**
 * Created by PhpStorm.
 * User: mgonzalez
 * Date: 14/7/16
 * Time: 19:34
 */
class Game
{

    private $validGame = true;
    private $players = [];

    private $mapa = [
        'BASKETBALL' => BasketballPlayer::class,
        'HANDBALL' => HandballPlayer::class
    ];

    public function __construct($file)
    {

        // Open file
        $gestor = fopen($file, "r");

        // Get game type (first liine)
        $gameName = fgetcsv($gestor)[0];

        while (($line = fgetcsv($gestor, 0, ';')) !== false) {

            // Each line represents a player stats for this game
            $playerStat = new ReflectionClass($this->mapa[$gameName]);
            $playerStat = $playerStat->newInstanceArgs([$line]);
            $this->addPlayer($playerStat);

            if ($this->isInvalidGame()) {

                return;
            }
        }

        // Close file
        fclose($gestor);

    }

    public function isInvalidGame(): bool
    {
        return !$this->validGame;
    }

    /**
     * @return array
     */
    public function getPlayers(): array
    {
        return $this->players;
    }


    public function addPlayer(Player $player)
    {
        $key = $player->getNickName();
        if (array_key_exists($key, $this->players)) {
            $this->validGame = false;
            return;
        }
        $this->players[$key] = $player;
    }
}