<?php

declare(strict_types=1);

namespace Registry;

use InvalidArgumentException;

/**
 * Class Registry Еще один вариант реализации шаблона registry
 * @package Registry
 */
class Registry
{
    /**
     * Константа (их может быть намного больше), определяющая возможный ключ.
     */
    public const DOMAIN_OBJECT = 'DomainObject';

    /**
     * Хранилище значений.
     * @var array
     */
    private static $storage = [];

    /**
     * Список возможных ключей.
     * @var array
     */
    private static $allowedKeys = [
        self::DOMAIN_OBJECT,
    ];

    /**
     * Registry constructor. Скрываем конструктор, он не нужен.
     */
    private function __construct() {}

    /**
     * @return string
     */
    private static function getAvailableKeys(): string
    {
        return implode(', ', static::$allowedKeys);
    }

    /**
     * Сеттер для установки значений по ключу.
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value)
    {
        if (!in_array($key, static::$allowedKeys)) {
            $keys = static::getAvailableKeys();
            throw new InvalidArgumentException(
                "Unknown key $key. Allowed keys: $keys."
            );
        }

        static::$storage[$key] = $value;
    }

    /**
     * Геттер для получения значения по ключу.
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        if (!in_array($key, static::$allowedKeys)) {
            $keys = static::getAvailableKeys();
            throw new InvalidArgumentException(
                "Unknown key $key. Allowed keys: $keys."
            );
        }

        if (!array_key_exists($key, static::$storage)) {
            throw new InvalidArgumentException("Undefined key $key.");
        }

        return static::$storage[$key];
    }
}