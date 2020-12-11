<?php

/** Constantes Globais */
define('ROOT', __DIR__ . '/../');

/** Inicialização do Autoloader */
require_once __DIR__ . '/../vendor/autoload.php';

/** Tratamento de Erros */
\App\Handler\ErrorHandler::initHandler();

/** Inicialização ORM */
use \Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '192.168.2.217',
    'database'  => 'projetinho',
    'username'  => 'root',
    'password'  => '1234',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
], 'default');
$capsule->setAsGlobal();
$capsule->bootEloquent();

/** Inicialização de Rotas */
require_once __DIR__ . '/../routes/routes.php';
