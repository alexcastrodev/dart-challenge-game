<?php

namespace Config;

use Siler\{Http\Response};
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public static function run()
    {
        try {
            $capsule = new Capsule;

            $capsule->addConnection([

                "driver" => "mysql",

                "host" => getenv('DB_HOST'),

                "database" => getenv('DB_NAME'),

                "username" => getenv('DB_USER'),

                "password" => getenv('DB_PASS')

            ]);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return $capsule;
        } catch (\Exception $e) {
            exit(Response\json(['error' => 'database connection'], 500));
        }
    }
}
