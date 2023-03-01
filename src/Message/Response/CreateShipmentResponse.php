<?php

namespace Omnipay\Billink\Message\Response;

class CreateShipmentResponse extends AbstractBillinkResponse
{
    public function isSuccessful()
    {
        return isset($this->data['MSG']['CODE']) && (int) $this->data['MSG']['CODE'] === 500;
    }

    public function getTransactionReference()
    {
        return $this->request->getOrderNumber();
    }
}
