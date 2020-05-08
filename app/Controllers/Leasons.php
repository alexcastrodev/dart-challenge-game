<?php
namespace App\Controllers;

use Siler\Http\Response;
use Siler\Http\Request;
use App\helpers\game;

class Leasons {
    public function init($params) {
        $code = $this->code();
        if($code == 'help') {
            return game::help($params['id']);
        }

        return $this->handle(game::play($params['id'], $code));
    }

    private function handle($leason) {
        return $leason ? Response\json(['message' => 'Parabéns!']) :
        Response\json(['message' => 'Errado :(']);
    }

    private function code() {
        try {
            $code = Request\json();
            if(is_null($code['code']) && !array_key_exists('code', $code)) {
                exit(Response\json(['message' => 'the field code is required'], 422));
            } else if (empty($code['code'])) {
                exit(Response\json(['message' => 'the field code cannot be empty'], 422));
            } else {
                return $code['code'];
            }
        } catch (\Exception $e) {
            exit(Response\json(['message' => 'json: Syntax error'], 422));
        }

    }
}

?>