<?php

use Noodlehaus\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

/** Tratamento de Erros */
\App\Handler\ErrorHandler::initHandler();

/** Config :: Globais */
$dotenv = \Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

/** Config :: Database */
$dbconfig = new Config(ROOT . 'config/database.php');
$connections = $dbconfig->get('connections');

/** ORM :: Conexões */
$capsule = new Capsule;
foreach ($connections as $name => $connection) {
    $capsule->addConnection($connection, $name);
}
$capsule->setAsGlobal();
$capsule->bootEloquent();
