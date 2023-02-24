<?php

namespace Omnipay\Billink\Message\Request;

use Omnipay\Billink\Message\Response\CustomerCreditWorthinessResponse;
use Omnipay\Billink\Traits\CreditCardToBillinkCustomer;

class CustomerCreditWorthinessRequest extends AbstractBillinkRequest
{
    use CreditCardToBillinkCustomer;

    public function getData()
    {
        return [
            'action' => 'Check',
            ...$this->cardToBillinkCustomer($this->getCard()),
            'orderAmount' => $this->getLinesTotal(),
            'ip' => $this->getIp(),
        ];
    }

    public function getChamberOfCommerceNumber(): string
    {
        return $this->getParameter('chamberOfCommerceNumber');
    }

    public function setChamberOfCommerceNumber(string $value)
    {
        return $this->setParameter('chamberOfCommerceNumber', $value);
    }

    public function getIp(): string
    {
        return $this->getParameter('ip');
    }

    public function setIp(string $value)
    {
        return $this->setParameter('ip', $value);
    }

    public function getType(): string
    {
        return $this->getParameter('type');
    }

    public function setType(string $value)
    {
        return $this->setParameter('type', $value);
    }

    public function sendData($data)
    {
        $response = $this->sendRequest(
            self::POST,
            'check',
            $data
        );

        return $this->response = new CustomerCreditWorthinessResponse($this, $response);
    }
}
