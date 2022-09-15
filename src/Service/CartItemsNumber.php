<?php

namespace App\Service;

use App\Manager\CartManager;

class CartItemsNumber
{
    public function number(CartManager $cartManager): string
    {
        $cartItemsNumber = strval(count($cartManager->getCurrentCart()->getItems()));

        return $cartItemsNumber;
    }
}