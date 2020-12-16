<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

if (!function_exists('view')) {
    /**
     * Configuração Blade View Engine
     * ------------------------------
     * Documentação Blade -> https://laravel.com/docs/8.x/blade
     * Nem todos os recursos são funcionais nessa estrutura de projeto modelo.
     */

    // Podem ser definidos vários diretórios onde estarão localizados os templates
    $templatePath = [ROOT . 'resources/views'];
    $cachePath = ROOT . 'storage/framework/cache/data';

    // Dependências
    $filesystem = new Filesystem;
    $eventDispatcher = new Dispatcher(new Container);

    // Criando View Factory capaz de renderizar PHP e Blade Templates
    $viewResolver = new EngineResolver;
    $bladeCompiler = new BladeCompiler($filesystem, $cachePath);

    $viewResolver->register('blade', function () use ($bladeCompiler) {
        return new CompilerEngine($bladeCompiler);
    });

    $viewResolver->register('php', function () use ($filesystem) {
        return new PhpEngine($filesystem);
    });

    $viewFinder = new FileViewFinder($filesystem, $templatePath);
    $viewFactory = new Factory($viewResolver, $viewFinder, $eventDispatcher);

    /**
     * Renderiza uma nova View.
     *
     * @param  string  $view
     * @param  mixed  $default
     * @return mixed
     */
    function view($view, $templateData = null)
    {
        // Renderização do Template através $view.blade.php
        return $GLOBALS['viewFactory']->make($view, $templateData);
    }
}
