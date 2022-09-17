<?php

namespace App\Service;

use App\Manager\CartManager;

class CartItemsService
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

    public function total(): float
    {
        $items = $this->cartManager->getCurrentCart()->getItems();
        foreach ($items as $item) {
            $total = $item->getTotal();
        }
        return $total;
    }
}