<?php

declare(strict_types=1);

namespace Registry;

/**
 * Одна из реализаций.
 * Class Config
 * @package Registry
 */
class Config
{
    /**
     * Массив сохраненных значений.
     * @var array
     */
    private static $storage = [];

    /**
     * Установка значения.
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public static function set(string $key, $value)
    {
        return self::$storage[$key] = $value;
    }

    /**
     * Получение значения.
     * @param string $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public static function get(string $key, $default = null)
    {
        return (isset(self::$storage[$key])) ? self::$storage[$key] : $default;
    }

    /**
     * Удаление значения.
     * @param string $key
     */
    public static function remove(string $key): void
    {
        unset(self::$storage[$key]);
    }
}