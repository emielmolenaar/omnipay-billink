<?php

namespace Omnipay\Billink\Traits;

use Omnipay\Billink\Item;
use Omnipay\Common\ItemBag;

trait ItemsToBillinkItems
{
    protected function itemBagToBillinkItems(ItemBag $itemBag): array
    {
        $items = [];

        foreach ($itemBag as $item) {
            $items[] = $this->itemToBillinkItem($item);
        }

        return $items;
    }

    protected function itemToBillinkItem(Item $item): array
    {
        return [
            'code' => $item->getSku(),
            'description' => $item->getName(),
            'orderQuantity' => $item->getQuantity(),
            'priceincl' => $item->getPrice(),
            'btw' => $item->getVat(),
        ];
    }
}
