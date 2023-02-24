<?php

namespace Omnipay\Billink\Traits;

use InvalidArgumentException;
use Omnipay\Billink\CreditCard;

trait CreditCardToBillinkCustomer
{
    protected function cardToBillinkCustomer(CreditCard $card, string $addressType = 'Billing'): array
    {
        if (! in_array($addressType, ['Billing', 'Shipping'])) {
            throw new InvalidArgumentException('Invalid address type specified. Address type must be either "Billing" or "Shipping".');
        }

        return [
            'type' => $card->getCustomerType(),
            'firstName' => $card->{'get' . $addressType . 'FirstName'}(),
            'lastName' => $card->{'get' . $addressType . 'LastName'}(),
            'street' => $card->{'get' . $addressType . 'Street'}(),
            'houseNumber' => $card->{'get' . $addressType . 'HouseNumber'}(),
            'houseExtension' => $card->{'get' . $addressType . 'HouseNumberSuffix'}(),
            'postalCode' => $card->{'get' . $addressType . 'Postcode'}(),
            'city' => $card->{'get' . $addressType . 'City'}(),
            'countryCode' => $card->{'get' . $addressType . 'Country'}(),
            'phoneNumber' => $card->{'get' . $addressType . 'Phone'}(),
            'companyName' => $card->{'get' . $addressType . 'Company'}(),
            'chamberOfCommerce' => $card->getCocNumber(),
            'email' => $card->getEmail(),
        ];
    }
}
