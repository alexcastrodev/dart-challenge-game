<?php
require_once '../vendor/autoload.php';
require "../config/bootstrap.php";

use Siler\{Http\Response, Route};
use App\Controllers\Leasons;



Response\header('Access-Control-Allow-Origin', '*');
Response\header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');

Route\get('/',  function () {
    return Response\json(['Hello' => 'What are you looking for?']);
});

Route\post('/challenge/{id}', [new Leasons(), 'init']);

if (!Route\did_match()) {
    return Response\json([], 404);
}
