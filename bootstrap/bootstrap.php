<?php

/** Constantes Globais */
define('ROOT', __DIR__ . '/../');

/** Autoloader */
require_once ROOT . 'vendor/autoload.php';

/** Dependências */
use Noodlehaus\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

/** Tratamento de Erros */
\App\Handler\ErrorHandler::initHandler();

/** Configurações */
$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();

$dbconfig = new Config(ROOT . 'config/database.php');
$connections = $dbconfig->get('connections');

/** ORM - Preparando Conexões */
$capsule = new Capsule;
foreach ($connections as $name => $connection) {
    $capsule->addConnection($connection, $name);
}

$capsule->setAsGlobal();
$capsule->bootEloquent();

/** Inicialização de Rotas */
require_once __DIR__ . '/../routes/routes.php';
