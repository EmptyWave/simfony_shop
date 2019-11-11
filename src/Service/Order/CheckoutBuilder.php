<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 12.09.2019
 * Time: 1:18
 */

namespace Service\Order;

use Model;
use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class CheckoutBuilder implements CheckoutBuilderInterface
{
  /**
   * @var ?Card
   */
  public $card;

  /**
   * @var ?NullObject
   */
  public $nullObject;

  /**
   * @var ?Email
   */
  public $email;

  /**
   * @var ?Security
   */
  public $security;


  /**
   * @return Card
   */
  public function getCard(): Card
  {
    return $this->card;
  }

  /**
   * @return NullObject
   */
  public function getNullObject(): NullObject
  {
    return $this->nullObject;
  }

  /**
   * @return Email
   */
  public function getEmail(): Email
  {
    return $this->email;
  }

  /**
   * @return Security
   */
  public function getSecurity(): Security
  {
    return $this->security;
  }

  /**
   * @param Card $card
   * @return CheckoutBuilderInterface
   */
  public function setCard(Card $card): CheckoutBuilderInterface
  {
      $this->card = $card;
      return $this;
  }

  /**
   * @param NullObject $nullObject
   * @return CheckoutBuilderInterface
   */
  public function setNullObject(NullObject $nullObject): CheckoutBuilderInterface
  {
      $this->nullObject = $nullObject;
      return $this;
  }

  /**
   * @param Email $email
   * @return CheckoutBuilderInterface
   */
  public function setEmail(Email $email): CheckoutBuilderInterface
  {
      $this->email = $email;
      return $this;
  }

  /**
   * @param Security $security
   * @return CheckoutBuilderInterface
   */
  public function setSecurity(Security $security): CheckoutBuilderInterface
  {
      $this->security = $security;
      return $this;
  }

  /**
   * @return Checkout
   */
  public function build(): Checkout
  {
      return new Checkout($this);
  }
}