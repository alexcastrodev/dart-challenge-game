<?php

namespace Config;

use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

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
