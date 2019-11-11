<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:09
 */

namespace Controller\PageController;

use Framework\BaseController;
use Controller\PageControllerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MainIndexController extends BaseController implements PageControllerInterface
{
  public function action(Request $request = NULL): Response
  {
    return $this->render('main/index.html.php');
  }
}