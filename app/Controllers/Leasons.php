<?php
namespace App\Controllers;

use Siler\Http\Response;
//use Siler\Http\Request;

class Leasons {
    function init() {
//        $params = Request\params();

        return Response\json(['Hello' => 'What are you looking for?']);
    }

    private function handle($leason) {
        return $leason ? Response\json(['message' => 'Parabéns!']) :
        Response\json(['message' => 'Errado :(']);
    }
}

?>