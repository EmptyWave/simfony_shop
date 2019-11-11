<?php

declare(strict_types=1);

namespace PageController;

// Page Controller - паттерн контроллера для обработки одной страницы.
class Controller
{
    public function action()
    {
        echo "Проверяем право доступа к странице\n";
        echo "Получаем параметры из POST и GET\n";
        echo "Обрабатываем полученные данные\n";
        echo "Формируем запрос к модели\n";
        echo "Полученные данные от модели передаем в представление\n";
    }
}

$controller = new Controller();
$controller->action();