<?php

namespace Omnipay\Billink\Message\Request;

use Omnipay\Billink\Message\Response\FetchOrderResponse;

class FetchOrderRequest extends AbstractBillinkRequest
{
    public function getData()
    {
        return [
            'action' => 'status',
            'invoices' => [
                'item' => [
                    'invoiceNumber' => $this->getTransactionReference(),
                ],
            ],
        ];
    }

    public function sendData($data)
    {
        $response = $this->sendRequest(
            self::POST,
            'status',
            $data
        );

        return $this->response = new FetchOrderResponse($this, $response);
    }
}
