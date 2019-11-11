<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 24.09.2019
 * Time: 1:35
 */

namespace Controller\PageController;

use Controller\PageControllerInterface;
use Framework\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Service\User\Security;

class UserAuthenticationController extends BaseController implements PageControllerInterface
{
  public function action(Request $request): ?Response
  {
    if ($request->isMethod(Request::METHOD_POST)) {
      $user = new Security($request->getSession());

      $isAuthenticationSuccess = $user->authentication(
        $request->request->get('login'),
        $request->request->get('password')
      );

      if ($isAuthenticationSuccess) {
        return $this->render(
          'user/authentication_success.html.php',
          ['user' => $user->getUser()]
        );
      }
      $error = 'Неправильный логин и/или пароль';
    }

    return $this->render(
      'user/authentication.html.php',
      ['error' => $error ?? '']
    );
  }
}