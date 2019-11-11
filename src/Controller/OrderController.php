<?php

declare(strict_types=1);

namespace Controller;

use Controller\PageController\OrderCheckoutController;
use Controller\PageController\OrderInfoController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use Service\Billing\Exception\BillingException;
use Service\Communication\Exception\CommunicationException;

class OrderController
{
  /**
   * @param Request $request
   * @return Response
   * @throws Exception
   */
    public function infoAction(Request $request): Response
    {
      return (new OrderInfoController())->action($request);
    }

  /**
   * @param Request $request
   * @return Response
   * @throws BillingException
   * @throws CommunicationException
   */
    public function checkoutAction(Request $request): Response
    {
      return (new OrderCheckoutController())->action($request);
    }
}
