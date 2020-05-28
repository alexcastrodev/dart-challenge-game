<?php

$isOptions = strtoupper($_SERVER['REQUEST_METHOD']) == 'OPTIONS';
$isSapiServer = in_array(strtolower(php_sapi_name()), ['cli-server', 'cli']);

// Cors Skip. All Headers are send by .htaccess
if ($isSapiServer) {
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, HEAD, OPTIONS');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Accept, Authorization, X-Requested-With, Origin');
  header('Access-Control-Max-Age: ' . (12 * 24 * 60));

  // Only Cors Request
  if ($isOptions) {
    http_response_code(204);
    exit;
  }
}


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
