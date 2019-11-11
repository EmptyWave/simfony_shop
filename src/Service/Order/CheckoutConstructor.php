<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 12.09.2019
 * Time: 1:38
 */

namespace Service\Order;

use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class CheckoutConstructor
{
    public function constructNewCheckout(CheckoutBuilderInterface $builder, SessionInterface $session): void
    {
        $builder->setCard(new Card())
          ->setNullObject(new NullObject())
          ->setEmail(new Email())
          ->setSecurity(new Security($session));
    }

    public function constructCustomCheckout(CheckoutBuilderInterface $builder, SessionInterface $session): void
    {
        // There could be your advertisement
    }
}