<?php

/**
 * Created by PhpStorm.
 * User: mgonzalez
 * Date: 14/7/16
 * Time: 16:35
 */

class BasketballPlayer extends Player
{

    private $number;
    private $teamName;
    private $position;
    private $scoredPoints;
    private $rebounds;
    private $assists;

    public function __construct(array $line)
    {
        parent::__construct($line);
        $this->number = $line[2];
        $this->teamName = $line[3];
        $this->position = $line[4];
        $this->scoredPoints = $line[5];
        $this->rebounds = $line[6];
        $this->assists = $line[7];

        $this->calculateRatingPoints();
    }

    private function getPointsMap(): array {
        return [
            'G' => [2, 3, 1],
            'F' => [2, 2, 2],
            'C' => [2, 1, 3]
        ];
    }

    private function getMyValuesByPosition() {
        $pointsMap = $this->getPointsMap();

        return $pointsMap[$this->position];
    }

    private function calculateRatingPoints() {
        $values = $this->getMyValuesByPosition();

        $rt = 0;
        $rt += $this->getScoredPoints()*$values[0];
        $rt += $this->getRebounds()*$values[1];
        $rt += $this->getAssists()*$values[2];

        $this->setRatingPoints($rt);
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getTeamName()
    {
        return $this->teamName;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getScoredPoints()
    {
        return $this->scoredPoints;
    }

    /**
     * @return mixed
     */
    public function getRebounds()
    {
        return $this->rebounds;
    }

    /**
     * @return mixed
     */
    public function getAssists()
    {
        return $this->assists;
    }

}