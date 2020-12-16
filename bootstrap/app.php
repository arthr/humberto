<?php

use Noodlehaus\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

/** Config :: Globais :: Facade Env */
$dotenv = \Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

/** Config :: Timezone */
date_default_timezone_set(env('APP_TIMEZONE', 'America/Sao_Paulo'));

/** Config :: Database */
$dbconfig = new Config(ROOT . 'config/database.php');
$connections = $dbconfig->get('connections');

/** Tratamento de Erros */
\App\Handler\ErrorHandler::initHandler();

/** ORM :: Conexões */
$capsule = new Capsule;
foreach ($connections as $name => $connection) {
    $capsule->addConnection($connection, $name);
}
$capsule->setAsGlobal();
$capsule->bootEloquent();
