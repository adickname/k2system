<?php

namespace App\DTO;

class Product
{
    private $currency, $name, $cost, $quantity;
    public function __construct($currency, $name, $cost, $quantity)
    {
        $this->currency = $currency;
        $this->name = $name;
        $this->cost = $cost;
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return [
            'quantity' => $this->quantity,
            'price_data' =>
            [
                'currency' => $this->currency,
                'product_data' => [
                    'name' => $this->name,
                ],
                'unit_amount' => $this->cost * 100,
            ]
        ];
    }
}
