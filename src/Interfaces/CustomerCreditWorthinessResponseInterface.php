<?php

namespace Omnipay\Billink\Interfaces;

interface CustomerCreditWorthinessResponseInterface
{
    public function isCreditworthy(): bool;

    public function getUuid(): ?string;
}
