<?php

namespace App\Handler;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ErrorHandler
{
    static $logger;
    static $handler;

    public static function initHandler()
    {
        self::prepareLogger();
        self::registerHandler();
    }

    private static function prepareLogger()
    {
        $today = date('Y-m-d');
        self::$logger = new Logger('PHP');
        self::$handler = new StreamHandler(ROOT . "storage/logs/{$today}.log");
        self::formatter();
        self::$logger->pushHandler(self::$handler);
    }

    private static function formatter()
    {
        $dateFormat = "Y-m-d\TH:i:s";
        $output = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
        $formatter = new LineFormatter($output, $dateFormat);
        self::$handler->setFormatter($formatter);
    }

    private static function registerHandler()
    {
        register_shutdown_function(function () {
            $err = error_get_last();
            if (!is_null($err)) {
                $errorLevel = Logger::NOTICE;
                switch ($err['type']) {
                    case 2: // E_WARNING
                        $errorLevel = Logger::WARNING;
                        break;
                    case 1: //E_ERROR
                        $errorLevel = Logger::ERROR;
                        break;
                    case 8: //E_NOTICE:
                        $errorLevel = Logger::INFO;
                        break;
                }

                $context = [
                    'file' => $err['file'],
                    'line' => $err['line']
                ];

                self::$logger->addRecord($errorLevel, $err['message'], $context);
            }
        });
    }
}
