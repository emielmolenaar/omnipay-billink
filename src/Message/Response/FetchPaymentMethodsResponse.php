<?php

namespace Omnipay\Billink\Message\Response;

use Omnipay\Common\Message\FetchPaymentMethodsResponseInterface;
use Omnipay\Common\PaymentMethod;

class FetchPaymentMethodsResponse extends AbstractBillinkResponse implements FetchPaymentMethodsResponseInterface
{
    public function getPaymentMethods()
    {
        return [
            new PaymentMethod('billink', 'Betaal op rekening met Billink'),
        ];
    }
}
