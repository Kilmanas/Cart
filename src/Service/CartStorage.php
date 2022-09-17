<?php

namespace App\Service;

use App\Entity\Cart;
use App\Repository\CartRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class CartStorage
{
    private $requestStack;

    public function __construct(RequestStack $requestStack, CartRepository $cartRepository)
    {
        $this->requestStack = $requestStack;
        $this->cartRepository = $cartRepository;
    }

    public function getCart(): ?Cart
    {
        return $this->cartRepository->findOneBy(['id' => $this->requestStack->getSession()->get('cart_id')]);
    }

    public function setCart(Cart $cart): void
    {
        $this->requestStack->getSession()->set('cart_id', $cart->getId());
    }
}