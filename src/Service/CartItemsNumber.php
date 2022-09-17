<?php

namespace App\Service;

use App\Manager\CartManager;

class CartItemsNumber
{
    private $cartManager;

    public function __construct(CartManager $cartManager)
    {
        $this->cartManager = $cartManager;
    }

    public function number(): string
    {
        $cartItemsNumber = count($this->cartManager->getCurrentCart()->getItems());

        return $cartItemsNumber;
    }
}