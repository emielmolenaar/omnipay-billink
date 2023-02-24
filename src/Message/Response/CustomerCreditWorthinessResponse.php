<?php

namespace Omnipay\Billink\Message\Response;

use Omnipay\Billink\Interfaces\CustomerCreditWorthinessResponseInterface;

class CustomerCreditWorthinessResponse extends AbstractBillinkResponse implements CustomerCreditWorthinessResponseInterface
{
    public function isCreditworthy(): bool
    {
        return isset($this->data['MSG']['CODE']) && (int) $this->data['MSG']['CODE'] === 500;
    }

    public function getUuid(): ?string
    {
        return $this->data['UUID'] ?? null;
    }
}
