<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:38
 */

namespace Controller\PageController;


use Controller\PageControllerInterface;
use Framework\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Service\User\Security;
use Exception;

class UserLogoutController extends BaseController implements PageControllerInterface
{
  /**
   * @param Request $request
   * @return null|Response
   * @throws Exception
   */
  public function action(Request $request): ?Response
  {
    (new Security($request->getSession()))->logout();

    return $this->redirect('index');
  }
}