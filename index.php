<?php
require_once __DIR__ . '/vendor/autoload.php';

use Siler\{Http\Response, Route};
use App\Controllers\Leasons;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Config\Database;

$database = Database::run();

Response\header('Access-Control-Allow-Origin', '*');
Response\header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');

Route\get('/',  function () {
    return Response\json(['Hello' => 'What are you looking for?']);
});

Route\post('/challenge/{id}', [new Leasons(), 'init']);

if (!Route\did_match()) {
    return Response\json([], 404);
}
