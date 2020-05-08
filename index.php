<?php
require_once __DIR__ . '/vendor/autoload.php';

use Siler\{Http\Response, Route};
use App\Controllers\Leasons;

Route\get('/',  function() {
    return Response\json(['Hello' => 'What are you looking for?']);
});

Route\post('/leason/{id}', [new Leasons(), 'init']);

if (!Route\did_match()) {
    return Response\json([], 404);
}

?>