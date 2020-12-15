<?php

/**
 * @package Estrutura Modelo
 * @author Arthur Morais <arthrmrs@gmail.com>
 */

/** 
 * Definições Globais
 * ---------------------------
 * Variáveis Globais para simplificar nossa vida em uma necessidade
 * futura. Definições como diretório raíz, startup da aplicação,
 * timezone, fuso, idioma, entre outras definições globais.
 */
define('ROOT', __DIR__ . '/../');
define('APP_START', microtime(true));

/**
 * Registrando o Autoloader
 * ------------------------
 * O Composer fornece um carregador de classes gerado automáticamente e
 * muito conveniente para nossa aplicação. Só precisamos utilizá-lo!
 * Vamos simplesmente importar isso no script aqui para que não nos
 * preocuparmos com o carregamento manual de qualquer classe mais tarde.
 * Agora é só relaxar! (⌐▨_▨)
 */
require_once ROOT . 'vendor/autoload.php';

/**
 * Boostrap App
 * ------------
 * Instanciamento de configurações, conexões, facades, entre inúmeras
 * ferramentas para uso global dentro da estrutura. Assim facilitamos
 * nossa vida deixando todas essas definições organizadas em um único
 * local e importando tudo no script aqui. 
 */
require_once ROOT . 'bootstrap/app.php';

/**
 * Roteador
 * --------
 * A mágica do gerenciamento de rotas (URL) através da aplicação.
 * Deixando todas as regras de roteamento em um único local para
 * uma fácil gestão e aplicação de futuros "Guards" para gerenciar
 * o acesso autenticado.
 */
require_once ROOT . 'routes/routes.php';
