<?php

require 'vendor/autoload.php';

use mpyw\Co\Co;
use mpyw\Co\CURLException;
use mpyw\Cowitter\Client;
use mpyw\Cowitter\HttpException;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->required([
    'CONSUMER_KEY',
    'CONSUMER_SECRET',
    'ACCESS_TOKEN',
    'ACCESS_TOKEN_SECRET',
    'NAME',
])->notEmpty();
$dotenv->load();

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://shindanmaker.com/498477',
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => http_build_query(['u' => $_ENV['NAME']]),
    CURLOPT_ENCODING => 'gzip',
]);
$response = curl_exec($curl);
curl_close($curl);

$html = $response;

$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($html);
$xpath = new DOMXPath($doc);


$name = $xpath->evaluate('//div[@class="result2"]')[0]->textContent;

$client = new Client([
    $_ENV['CONSUMER_KEY'],
    $_ENV['CONSUMER_SECRET'],
    $_ENV['ACCESS_TOKEN'],
    $_ENV['ACCESS_TOKEN_SECRET']
]);

$client->post('account/update_profile', ['name' => $name]);
