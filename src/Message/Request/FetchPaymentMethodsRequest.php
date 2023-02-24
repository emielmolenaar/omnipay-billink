<?php

namespace Omnipay\Billink\Message\Request;

use Omnipay\Billink\Message\Response\FetchPaymentMethodsResponse;

class FetchPaymentMethodsRequest extends AbstractBillinkRequest
{
    public function getData(): array
    {
        return [];
    }

    public function sendData($data)
    {
        return $this->response = new FetchPaymentMethodsResponse($this, []);
    }
}
