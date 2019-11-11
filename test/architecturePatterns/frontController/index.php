<?php

declare(strict_types=1);

namespace FrontController;

use FrontController\FrontController\FrontController;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $className = preg_replace('/^FrontController/', '', $className);
    require_once __DIR__ . $className . '.php';
});

echo "Первый вызов:\n\n";
// Вариант использования для http запроса.
$frontController = new FrontController();
$frontController->run();

echo "\n--------------------\n";
echo "Второй вызов:\n\n";
// Другой вариант использования, например если бы мы вызывали из командной
// строки какой-либо action у контроллера.
$frontController = new FrontController([
    'controller' => 'user',
    'action' => 'view',
    'params' => ['id' => 5]
]);
$frontController->run();
