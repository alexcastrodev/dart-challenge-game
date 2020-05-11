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
        // $help = Challenge::where('id', $id)->get();
        // var_dump($help);
        switch ($id) {
            case 1:
                $message = 'Leia 2 valores inteiros e armazene-os nas variáveis A e B. Efetue a soma de A e B atribuindo o seu resultado na variável X. Imprima X conforme exemplo apresentado abaixo. Não apresente mensagem alguma além daquilo que está sendo especificado e não esqueça de imprimir o fim de linha após o resultado, caso contrário, você receberá "Erro na apresentação".
                Entrada
                
                A entrada contém 2 valores inteiros.
                Saída
                
                Imprima a mensagem "X = " (letra X maiúscula) seguido pelo valor da variável X e pelo final de linha. Cuide para que tenha um espaço antes e depois do sinal de igualdade, conforme o exemplo abaixo.';
                break;
            default:
                exit(Response\json([], 404));
                break;
        }
        return Response\json(['message' => $message]);
    }
}
