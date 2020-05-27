<?php

namespace App\helpers;

use Siler\Http\Response;
use App\Model\Challenge;
use App\helpers\darkside;

class game
{

    public static function play($id, $code)
    {
        darkside::scan($code);

        $challenge = Challenge::select('help', 'expect')->where('id', $id)->first();

        if (!$challenge) {
            exit(Response\json([], 404));
        }

        if (trim($code) == 'help') {
            exit(static::help($challenge));
        }

        $game = false;
        $game = static::start($code, $challenge);

        return $game;
    }

    private static function start($code, $challenge)
    {
        $fileName = __DIR__ . '/codes/dart-' . rand(1, 1000) . '-' . date('Y-m-d--H-m-i') . '.dart';
        file_put_contents($fileName, $code);

        if (static::runCode($fileName) == $challenge->expect) {
            return true;
        }
        return false;
    }

    private static function runCode($file)
    {
        $output = shell_exec('dart ' . $file);
        return trim($output);
    }

    public static function help($challenge)
    {
        return Response\json(['message' => $challenge->help]);
    }
}
