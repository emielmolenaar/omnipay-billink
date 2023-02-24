<?php

namespace Omnipay\Billink\Traits;

trait DefaultParameters
{
    public function allDefaultParameters(): array
    {
        return [
            'version' => $this->getVersion(),
            'clientUserName' => $this->getClientUserName(),
            'clientId' => $this->getClientId(),
            'workFlowNumber' => $this->getWorkFlowNumber(),
        ];
    }

    public function getVersion(): string
    {
        return $this->getParameter('version');
    }

    public function setVersion(string $value): self
    {
        return $this->setParameter('version', $value);
    }

    public function getClientId(): string
    {
        return $this->getParameter('clientId');
    }

    public function setClientId(string $value)
    {
        return $this->setParameter('clientId', $value);
    }

    public function getClientUserName(): string
    {
        return $this->getParameter('clientUserName');
    }

    public function setClientUserName(string $value)
    {
        return $this->setParameter('clientUserName', $value);
    }

    public function getWorkFlowNumber(): string
    {
        return $this->getParameter('workFlowNumber');
    }

    public function setWorkFlowNumber(string $value)
    {
        return $this->setParameter('workFlowNumber', $value);
    }
}
