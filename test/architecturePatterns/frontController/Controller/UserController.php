<?php

declare(strict_types=1);

namespace FrontController\Controller;

class UserController
{
    public function view($id)
    {
        echo "Открываем пользователя с id=$id.\n";
    }
}