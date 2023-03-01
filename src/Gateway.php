<?php

namespace Omnipay\Billink;

use Omnipay\Billink\Message\Request\CreateOrderRequest;
use Omnipay\Billink\Message\Request\CreateShipmentRequest;
use Omnipay\Billink\Message\Request\CustomerCreditWorthinessRequest;
use Omnipay\Billink\Message\Request\FetchIssuersRequest;
use Omnipay\Billink\Message\Request\FetchOrderRequest;
use Omnipay\Billink\Message\Request\FetchPaymentMethodsRequest;
use Omnipay\Billink\Traits\DefaultParameters;
use Omnipay\Common\AbstractGateway;

/**
 * @see https://developers.billink.nl/docs
 */
class Gateway extends AbstractGateway
{
    use DefaultParameters;

    public const GATEWAY_VERSION = '1.0';

    public function getName(): string
    {
        return 'Billink';
    }

    public function getDefaultParameters(): array
    {
        return [
            'version' => 'BILLINK2.0',
            'clientUserName' => '',
            'clientId' => '',
            'workFlowNumber' => '1',
        ];
    }

    public function fetchIssuers(array $parameters = []): FetchIssuersRequest
    {
        return $this->createRequest(FetchIssuersRequest::class, $parameters);
    }

    public function fetchPaymentMethods(array $parameters = []): FetchPaymentMethodsRequest
    {
        return $this->createRequest(FetchPaymentMethodsRequest::class, $parameters);
    }

    public function checkCustomerCreditWorthiness(array $parameters = []): CustomerCreditWorthinessRequest
    {
        return $this->createRequest(CustomerCreditWorthinessRequest::class, $parameters);
    }

    public function createOrder(array $parameters = []): CreateOrderRequest
    {
        return $this->createRequest(CreateOrderRequest::class, $parameters);
    }

    public function fetchOrder(array $parameters = []): FetchOrderRequest
    {
        return $this->createRequest(FetchOrderRequest::class, $parameters);
    }

    public function createShipment(array $parameters = []): CreateShipmentRequest
    {
        return $this->createRequest(CreateShipmentRequest::class, $parameters);
    }
}
