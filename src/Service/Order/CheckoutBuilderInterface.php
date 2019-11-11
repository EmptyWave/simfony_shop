<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 12.09.2019
 * Time: 1:04
 */

declare(strict_types = 1);

namespace Service\Order;

use Model;
use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;


interface CheckoutBuilderInterface
{
    public function getCard(): ?Card;

    public function getNullObject(): ?NullObject;

    public function getEmail(): ?Email;

    public function getSecurity(): ?Security;

    public function setCard(Card $card): self;

    public function setNullObject(NullObject $nullObject): self;

    public function setEmail(Email $email): self;

    public function setSecurity(Security $security): self;

    public function build(): Checkout;
}