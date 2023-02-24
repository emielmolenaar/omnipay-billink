<?php

namespace Omnipay\Billink\Traits;

use Omnipay\Billink\CreditCard;

trait CreditCardToBillinkDeliveryAddress
{
    /**
     * @desc Yes, there is a typo in deliverySteet. This is how it is in the Billink API.
     */
    protected function cardToBillinkCustomer(CreditCard $card): array
    {
        return [
            'deliverySteet' => $card->getShippingStreet(),
            'deliveryHouseNumber' => $card->getShippingHouseNumber(),
            'deliveryHouseExtension' => $card->getShippingHouseNumberSuffix(),
            'deliveryPostalCode' => $card->getShippingPostcode(),
            'deliveryCity' => $card->getShippingCity(),
            'deliveryCountryCode' => $card->getShippingCountry(),
        ];
    }
}
