<?php

/**
 * Created by PhpStorm.
 * User: mgonzalez
 * Date: 14/7/16
 * Time: 19:45
 */
class GamesFactory
{

    public static function getMap(): array {
        return [
            'BASKETBALL' => BasketballPlayer::class
        ];
    }

    public static function instancePlayer(string $gameType) {
        return GamesFactory::getMap()[$gameType];
    }

}