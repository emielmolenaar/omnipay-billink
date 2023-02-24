<?php

namespace Omnipay\Billink\Message\Response;

use Omnipay\Common\Message\AbstractResponse;

class AbstractBillinkResponse extends AbstractResponse
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }

    public function getRedirectData()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return json_encode($this->data);
    }
}
