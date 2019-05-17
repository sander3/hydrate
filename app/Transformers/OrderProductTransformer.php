<?php

namespace App\Transformers;

use App\Product;

class OrderProductTransformer
{
    public static function fromInput(array $array): array
    {
        return collect($array)
            ->keyBy('id')
            ->transform(function (
                $item,
                $key
            ) {
                return [
                    'quantity'   => $item['quantity'],
                    'unit_price' => Product::query()
                        ->select('unit_price')
                        ->findOrFail($key)
                        ->unit_price,
                ];
            })
            ->toArray();
    }
}
