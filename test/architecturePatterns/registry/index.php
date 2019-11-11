<?php

declare(strict_types=1);

namespace Registry;

// У нас один класс в данном случае, в него можно записывать значения, можно
// получать значения. Ниже 2 варианта использование, для 2-х реализаций.

require_once 'Config.php'; // Первая, простая реализация.
require_once 'Registry.php'; // Вторая реализация с проверками.

// Использование первого варианта:
// Записываем значение.
Config::set('apiKey', 'secretKey');

// Получаем значение.
echo Config::get('apiKey') . "\n";

// ----------------------------------

// Использование второго варианта:
// Записываем значение.
Registry::set(Registry::DOMAIN_OBJECT, 'secretKey');

// Получаем значение.
echo Registry::get(Registry::DOMAIN_OBJECT) . "\n";