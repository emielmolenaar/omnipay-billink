<?php

namespace Omnipay\Billink;

use Omnipay\Common\CreditCard as OmnipayCreditCard;

class CreditCard extends OmnipayCreditCard
{
    public const CUSTOMER_TYPE_PRIVATE = 'P';

    public const CUSTOMER_TYPE_BUSINESS = 'B';

    public function getIsBusiness()
    {
        return $this->getParameter('isBusiness');
    }

    public function setIsBusiness(int $value): self
    {
        return $this->setParameter('isBusiness', $value);
    }

    public function getCustomerType(): string
    {
        return ($this->getIsBusiness() === 1) ? self::CUSTOMER_TYPE_BUSINESS : self::CUSTOMER_TYPE_PRIVATE;
    }

    public function getBillingInitials()
    {
        return $this->getParameter('billingInitials');
    }

    public function setBillingInitials(string $value): self
    {
        return $this->setParameter('billingInitials', $value);
    }

    public function getBillingStreet()
    {
        return $this->getParameter('billingStreet');
    }

    public function setBillingStreet(string $value): self
    {
        return $this->setParameter('billingStreet', $value);
    }

    public function getBillingHouseNumber()
    {
        return $this->getParameter('billingHouseNumber');
    }

    public function setBillingHouseNumber(string $value): self
    {
        return $this->setParameter('billingHouseNumber', $value);
    }

    public function getBillingHouseNumberSuffix()
    {
        return $this->getParameter('billingHouseNumberSuffix');
    }

    public function setBillingHouseNumberSuffix(string $value): self
    {
        return $this->setParameter('billingHouseNumberSuffix', $value);
    }

    public function getShippingInitials()
    {
        return $this->getParameter('shippingInitials');
    }

    public function setShippingInitials(string $value): self
    {
        return $this->setParameter('shippingInitials', $value);
    }

    public function getShippingStreet()
    {
        return $this->getParameter('shippingStreet');
    }

    public function setShippingStreet(string $value): self
    {
        return $this->setParameter('shippingStreet', $value);
    }

    public function getShippingHouseNumber()
    {
        return $this->getParameter('shippingHouseNumber');
    }

    public function setShippingHouseNumber(string $value): self
    {
        return $this->setParameter('shippingHouseNumber', $value);
    }

    public function getShippingHouseNumberSuffix()
    {
        return $this->getParameter('shippingHouseNumberSuffix');
    }

    public function setShippingHouseNumberSuffix(string $value): self
    {
        return $this->setParameter('shippingHouseNumberSuffix', $value);
    }

    public function getCocNumber()
    {
        return $this->getParameter('cocNumber');
    }

    public function setCocNumber(string $value): self
    {
        return $this->setParameter('cocNumber', $value);
    }
}
