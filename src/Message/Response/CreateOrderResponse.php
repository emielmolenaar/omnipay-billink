<?php

namespace Omnipay\Billink\Message\Response;

class CreateOrderResponse extends AbstractBillinkResponse
{
    public function isSuccessful()
    {
        return isset($this->data['MSG']['CODE']) && (int) $this->data['MSG']['CODE'] === 200;
    }

    public function getTransactionReference()
    {
        return $this->request->getOrderNumber();
    }
}
