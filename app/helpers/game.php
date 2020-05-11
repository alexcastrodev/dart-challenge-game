<?php

namespace App\helpers;

use Siler\Http\Response;
use App\Model\Challenge;
use App\helpers\darkside;

class game
{
    const expected = [
        //        1 => '19:string'
        1 => 'hello'
    ];
    public static function play($id, $code)
    {
        darkside::scan($code);
        $game = false;
        switch ($id) {
            case 1:
                $game = static::leason_one($code);
                break;
            default:
                exit(Response\json([], 404));
                break;
        }

        return $game;
    }

    private static function leason_one($code)
    {
        $fileName = __DIR__ . '/codes/dart-' . rand(1, 1000) . '-' . date('Y-m-d--H-m-i') . '.dart';
        file_put_contents($fileName, $code);

        if (static::runCode($fileName) == static::expected[1]) {
            return true;
        }
        return false;
    }

    private static function runCode($file)
    {
        $output = shell_exec('dart ' . $file);
        return trim($output);
    }

    public static function help($id)
    {
        $help = Challenge::select('help')->where('id', $id)->first();

        if (count($help) > 0) {
            return Response\json(['message' => $help]);
        }
        exit(Response\json([], 404));
    }
}
