<?php
include_once "Bot.php";
$bot = new Bot();
$url = 'http://www.google.com.tw';
$result = $bot->getContent($url);

var_dump($result['STATUS']);
