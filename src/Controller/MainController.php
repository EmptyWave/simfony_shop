<?php

declare(strict_types = 1);

namespace Controller;

use Controller\PageController\MainIndexController;
use Symfony\Component\HttpFoundation\Response;

class MainController
{
  /**
   * @return Response
   */
    public function indexAction(): Response
    {
        return (new MainIndexController())->action();
    }
}
