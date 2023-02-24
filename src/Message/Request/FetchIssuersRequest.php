<?php

namespace Omnipay\Billink\Message\Request;

use Omnipay\Billink\Message\Response\FetchIssuersResponse;

class FetchIssuersRequest extends AbstractBillinkRequest
{
    public function getData(): array
    {
        return [];
    }

    public function sendData($data)
    {
        return $this->response = new FetchIssuersResponse($this, []);
    }
}
