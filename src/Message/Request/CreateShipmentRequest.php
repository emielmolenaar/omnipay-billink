<?php

namespace Omnipay\Billink\Message\Request;

use Omnipay\Billink\Message\Response\CreateShipmentResponse;

class CreateShipmentRequest extends AbstractBillinkRequest
{
    public function getData()
    {
        return [
            'action' => 'activate order',
            'invoices' => [
                'item' => array_filter([
                    'invoiceNumber' => $this->getOrderNumber(),
                    'workflowNumber' => $this->getWorkFlowNumber(),
                    'trackAndTrace' => $this->getTrackAndTrace(),
                ]),
            ],
        ];
    }

    public function getOrderNumber(): string
    {
        return $this->getParameter('orderNumber');
    }

    public function setOrderNumber(string $value)
    {
        return $this->setParameter('orderNumber', $value);
    }

    public function getTrackAndTrace(): ?string
    {
        return $this->getParameter('trackAndTrace');
    }

    public function setTrackAndTrace(?string $value = null)
    {
        return $this->setParameter('trackAndTrace', $value);
    }

    public function sendData($data)
    {
        $response = $this->sendRequest(
            self::POST,
            'start-workflow',
            $data
        );

        return $this->response = new CreateShipmentResponse($this, $response);
    }
}
