<?php

/**
 * Created by PhpStorm.
 * User: mgonzalez
 * Date: 14/7/16
 * Time: 13:33
 */
class Player
{
    private $playerName = '';
    private $nickName = '';
    private $ratingPoints;

    // TODO: throw exception to invalidate the full set
    public function __construct(array $line)
    {
        $this->playerName = $line[0];
        $this->nickName = $line[1];
        $this->ratingPoints = 0;
    }

    /**
     * @return string
     */
    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @return int
     */
    public function getRatingPoints(): int
    {
        return $this->ratingPoints;
    }

    /**
     * @param int $ratingPoints
     */
    public function setRatingPoints(int $ratingPoints)
    {
        $this->ratingPoints = $ratingPoints;
    }

}