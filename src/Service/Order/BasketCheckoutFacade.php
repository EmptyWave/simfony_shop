<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 19.09.2019
 * Time: 1:22
 */

namespace Service\Order;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketCheckoutFacade
{
  /**
   * @var CheckoutConstructor
   */
  public $constructor;
  /**
   * @var CheckoutBuilder
   */
  public $builder;

  /**
   * BasketCheckoutFacade constructor.
   * @param CheckoutConstructor $constructor
   * @param CheckoutBuilder $builder
   */
  public function __construct(CheckoutConstructor $constructor, CheckoutBuilder $builder)
  {
    $this->constructor = $constructor;
    $this->builder = $builder;
  }

  /**
   * @param SessionInterface $session
   * @return Checkout
   */
  public function build($session){
    $this->constructor->constructNewCheckout($this->builder, $session);
    return $this->builder->build();
  }

}