<?php

/**
 * Created by PhpStorm.
 * User: mgonzalez
 * Date: 14/7/16
 * Time: 22:42
 */
class HandballPlayer extends Player
{

    private $number;
    private $teamName;
    private $position;
    private $goalsMade;
    private $goalsReceived;

    public function __construct(array $line)
    {
        parent::__construct($line);
        $this->number = $line[2];
        $this->teamName = $line[3];
        $this->position = $line[4];
        $this->goalsMade = $line[5];
        $this->goalsReceived = $line[6];
    }

    private function getPointsMap(): array
    {
        return [
            'G' => [5, -2],
            'F' => [1, -1],
        ];
    }

    private function getMyValuesByPosition()
    {
        $pointsMap = $this->getPointsMap();

        return $pointsMap[$this->getPosition()];
    }

    private function calculateRatingPoints()
    {
        $values = $this->getMyValuesByPosition();

        $rt = 0;
        $rt += $this->getGoalsMade() * $values[0];
        $rt += $this->getGoalsReceived() * $values[1];

        $this->setRatingPoints($rt);
    }


    // ****
    // *        Getters/Setters
    // ***
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
    public function getGoalsMade()
    {
        return $this->goalsMade;
    }

    /**
     * @return mixed
     */
    public function getGoalsReceived()
    {
        return $this->goalsReceived;
    }


}