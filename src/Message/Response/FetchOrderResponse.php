<?php

namespace Omnipay\Billink\Message\Response;

use App\Support\Arr;

class FetchOrderResponse extends AbstractBillinkResponse
{
    public function isSuccessful()
    {
        return true;

        return isset($this->data['MSG']['CODE']) && (int) $this->data['MSG']['CODE'] === 200;
    }

    public function getStatus()
    {
        return Arr::first($this->data['MSG']['INVOICES'])['STATUS'];
    }
}
