<?php

declare(strict_types=1);

namespace FrontController\FrontController;

use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;

// Пример FrontController. Это паттерн, когда все запросы проходят через
// данный класс, данный класс уже вызывает нужный обработчик.
// Здесь нет конкретной реализации, данный пример прост и создан только чтобы
// донести смысл того как это работает.
class FrontController
{
    private const CONTROLLER_NAMESPACE = 'FrontController\Controller\\';

    protected $controller;
    protected $action;
    protected $params = [];

    /**
     * FrontController constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        if (empty($options)) {
            $this->parseUri();
        } else {
            if (isset($options["controller"])) {
                $this->setController($options["controller"]);
            }
            if (isset($options["action"])) {
                $this->setAction($options["action"]);
            }
            if (isset($options["params"])) {
                $this->setParams($options["params"]);
            }
        }
    }

    /**
     * Здесь происходит разбор запроса по URI.
     */
    protected function parseUri()
    {
        echo "Разбираем URL, получаем из URL информацию о том, какой нужно " .
            "вызвать controller, action, какие параметры запроса.\n";
        // Для примера ставим всегда контроллер Index.
        $this->setController('Index');
        // Для примера ставим всегда action index.
        $this->setAction('index');
        // Допустим что параметров у нас здесь нет.
        $this->setParams([]);
    }

    /**
     * Установка нужного controller, проверяя существует ли такой.
     * @param $controller
     * @return $this
     */
    public function setController($controller)
    {
        $controller = static::CONTROLLER_NAMESPACE .
            ucfirst(strtolower($controller)) . "Controller";
        if (!class_exists($controller)) {
            throw new InvalidArgumentException(
                "Контроллера '$controller' не существует."
            );
        }
        $this->controller = $controller;
        return $this;
    }

    /**
     * Установка нужного action, проверяя существует ли такой.
     * @param $action
     * @return $this
     */
    public function setAction($action)
    {
        try {
            $reflector = new ReflectionClass($this->controller);
        } catch (ReflectionException $e) {
            throw new InvalidArgumentException(
                "Контроллера '$this->controller' не существует."
            );
        }
        if (!$reflector->hasMethod($action)) {
            throw new InvalidArgumentException(
                "Метода '$action' не существует."
            );
        }
        $this->action = $action;
        return $this;
    }

    /**
     * Установка параметров запроса.
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * Вызов нужного контроллера и метода.
     */
    public function run()
    {
        call_user_func_array(
            [new $this->controller, $this->action],
            $this->params
        );
    }
}