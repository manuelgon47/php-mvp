<?php
/**
 * Created by PhpStorm.
 * User: mgonzalez
 * Date: 14/7/16
 * Time: 18:32
 */

include_once 'mvp/Tournament.php';
include_once 'mvp/Player.php';
include_once 'mvp/games/BasketballPlayer.php';
include_once 'mvp/Game.php';
include_once 'mvp/games/GamesFactory.php';
include_once 'mvp/games/HandballPlayer.php';

new Tournament(['mvp/assets/file1.txt','mvp/assets/file2.txt','mvp/assets/file3.txt']);
//new Tournament(['mvp/assets/file2.txt']);

//    __DIR__
//    __FILE__
//    __LINE__
