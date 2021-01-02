<?php
require './vendor/autoload.php';

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$config = [
    'facebook' => [
        'token' => 'EAAoVvZAVj6lkBAP8aZBeHEby7XzvWv4cYb9uRkeopfd2WTLLaQQPuJYaIfEcdo5IZCqxAlmGcZAu0ZCCKlzgOeuyuefIRFCURD7ktBekttHTaRIy27z1ErmFY78PleQYayICSIiwxmQaYHEGdc5uzMnCdZBgOg5ZCM2MfJtViqa6GX5UOui8b8m',
        'app_secret' => '213e6e8b4b1b79035f5f61925f937939',
        'verification' => 'abc_123',
    ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('hello|hi|namaste|salam|what\'sup', function (BotMan $bot) {
    $bot->reply('Hello this is Jarvis! What can i help you?');
});
$botman->hears('share|stock|equity|what is equity|share|stock|share market|stock market', function (BotMan $bot) {
    $bot->reply('Share/stock means taking ownership in business.');
});
$botman->hears('type of share?', function (BotMan $bot) {
    $bot->reply('Share is share you idiot');
});

// Start listening
$botman->listen();
