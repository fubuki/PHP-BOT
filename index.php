<?php

include_once "Bot.php";

$bot = new Bot();
$url = 'http://www.google.com.tw';

$html = $bot->getContent($url);

$urlArray = $bot->parserUrl($html['FILE']);

