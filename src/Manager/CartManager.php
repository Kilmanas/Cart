<?php

namespace App\Manager;

use App\Entity\Cart;
use App\Service\cartStorage;
use Doctrine\ORM\EntityManagerInterface;

class CartManager
{

    private $cartStorage;
    private $entityManager;

    public function __construct(CartStorage $cartStorage, EntityManagerInterface $entityManager)
    {
        $this->cartStorage = $cartStorage;
        $this->entityManager = $entityManager;
    }

    public function getCurrentCart(): Cart
    {
        $cart = $this->cartStorage->getCart();

        if (!$cart) {
            $cart = new Cart();
            $cart->setCreatedAt(new \DateTimeImmutable());
        }

        return $cart;
    }

    public function save(Cart $cart)
    {
        $this->entityManager->persist($cart);
        $this->entityManager->flush();
        $this->cartStorage->setCart($cart);
    }
}