<?php

/**
 * Created by PhpStorm.
 * User: mgonzalez
 * Date: 14/7/16
 * Time: 18:07
 */
class Tournament
{
    /**
     * @var array
     * [
     *    'nickname' => [acumulatedRatingPoints, Player]
     * ]
     */
    private $players = [];

    public function __construct(array $files)
    {
        foreach ($files as $file) {
            // Un fichero es un game

            $game = new Game($file);
            if ($game->isInvalidGame()) {
                var_dump("Ficheros corruptos");
                die();
                return;
            }
            $players = $game->getPlayers();
            $this->addPlayers($players);

        }

        var_dump(print_r($this->getMVP()));

    }

    // TODO: Sort and return the first
    function getMVP(): Player
    {
        $mvp = null;
        foreach ($this->players as $player) {
            if ($mvp == null) {
                $mvp = $player;
            }


            if ($player->getRatingPoints() > $mvp->getRatingPoints()) {
                $mvp = $player;
            }

        }

        return $mvp;
    }

    public function addPlayers(array $players)
    {

        foreach ($players as $player) {
            $this->addPlayer($player);
        }

    }

    public function addPlayer(Player $player)
    {
        $key = $player->getNickName();
        $rt = $player->getRatingPoints();
        if (array_key_exists($key, $this->players)) {
            $rt += $this->players[$key]->getRatingPoints();

        }
        $player->setRatingPoints($rt);
        $this->players[$key] = $player;
    }

}