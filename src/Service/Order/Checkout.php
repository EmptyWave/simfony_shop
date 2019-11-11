<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 12.09.2019
 * Time: 1:32
 */

namespace Service\Order;


class Checkout
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

    public function __construct(CheckoutBuilder $builder)
    {
        $this->card = $builder->card;
        $this->nullObject = $builder->nullObject;
        $this->email = $builder->email;
        $this->security = $builder->security;
    }
}