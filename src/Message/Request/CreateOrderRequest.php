<?php

namespace Omnipay\Billink\Message\Request;

use Omnipay\Billink\Message\Response\CreateOrderResponse;
use Omnipay\Billink\Traits\CreditCardToBillinkCustomer;
use Omnipay\Billink\Traits\ItemsToBillinkItems;

class CreateOrderRequest extends AbstractBillinkRequest
{
    use CreditCardToBillinkCustomer;
    use ItemsToBillinkItems;

    public function getData()
    {
        return array_filter([
            'action' => 'Order',
            ...$this->cardToBillinkCustomer($this->getCard()),
            'orderAmount' => $this->getLinesTotal(),
            'ip' => $this->getIp(),
            'checkUuid' => $this->getCustomerCreditWorthyKey(),
            'orderNumber' => $this->getOrderNumber(),
            'date' => $this->getDate(),
            'currency' => $this->getCurrency(),
            'aditionalText' => $this->getAditionalText(),
            'orderItems' => [
                'items' => $this->itemBagToBillinkItems($this->getItems()),
            ],
        ]);
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

    public function getCustomerCreditWorthyKey(): string
    {
        return $this->getParameter('customerCreditWorthyKey');
    }

    public function setCustomerCreditWorthyKey(string $value)
    {
        return $this->setParameter('customerCreditWorthyKey', $value);
    }

    public function getOrderNumber(): string
    {
        return $this->getParameter('orderNumber');
    }

    public function setOrderNumber(string $value)
    {
        return $this->setParameter('orderNumber', $value);
    }

    public function getDate(): string
    {
        return $this->getParameter('date');
    }

    public function setDate(string $value)
    {
        return $this->setParameter('date', $value);
    }

    /**
     * @desc Yes, there is a typo here. But that's how it is in the API.
     */
    public function getAditionalText(): ?string
    {
        return $this->getParameter('aditionalText');
    }

    /**
     * @desc Yes, there is a typo here. But that's how it is in the API.
     */
    public function setAditionalText(string $value)
    {
        return $this->setParameter('aditionalText', $value);
    }

    public function sendData($data)
    {
        $response = $this->sendRequest(
            self::POST,
            'order',
            $data
        );

        return $this->response = new CreateOrderResponse($this, $response);
    }
}
