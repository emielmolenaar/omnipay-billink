<?php

namespace Omnipay\Billink;

use Omnipay\Common\Item as OmnipayItem;

class Item extends OmnipayItem
{
    public function getSku(): string
    {
        return $this->getParameter('sku');
    }

    public function setSku($value): self
    {
        return $this->setParameter('sku', $value);
    }

    public function getTotal()
    {
        return $this->getParameter('total');
    }

    public function setTotal($value): self
    {
        return $this->setParameter('total', $value);
    }

    public function getVat()
    {
        return $this->getParameter('vat');
    }

    public function setVat($value): self
    {
        return $this->setParameter('vat', $value);
    }

    public function getGrandTotal()
    {
        return $this->getParameter('grandTotal');
    }

    public function setGrandTotal($value): self
    {
        return $this->setParameter('grandTotal', $value);
    }
}
