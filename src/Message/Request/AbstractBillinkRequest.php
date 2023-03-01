<?php

namespace Omnipay\Billink\Message\Request;

use Exception;
use InvalidArgumentException;
use Log;
use Omnipay\Billink\CreditCard;
use Omnipay\Billink\Item;
use Omnipay\Billink\Traits\DefaultParameters;
use Omnipay\Common\Message\AbstractRequest;
use Spatie\ArrayToXml\ArrayToXml;

abstract class AbstractBillinkRequest extends AbstractRequest
{
    use DefaultParameters;

    public const POST = 'POST';

    public const GET = 'GET';

    public const DELETE = 'DELETE';

    protected string $liveEndpointBaseUrl = 'https://client.billink.nl/api/';

    protected string $testEndpointBaseUrl = 'https://test.billink.nl/api/';

    public function setCard($value)
    {
        if ($value && ! $value instanceof CreditCard) {
            $value = new CreditCard($value);
        }

        return $this->setParameter('card', $value);
    }

    public function setLines($items)
    {
        return $this->setItems($items);
    }

    public function setItems($items)
    {
        $orderItems = [];

        foreach ($items as $item) {
            if (is_array($item)) {
                $orderItems[] = new Item($item);

                continue;
            }

            if (! ($item instanceof Item)) {
                throw new InvalidArgumentException('Item should be an instance of ' . Item::class);
            }
        }

        return parent::setItems($orderItems);
    }

    public function getLinesTotal(): float
    {
        $total = 0.00;

        foreach ($this->getItems() as $item) {
            /**
             * @var Item $item
             */
            $total += (float) $item->getGrandTotal();
        }

        return $total;
    }

    protected function buildEndPointUrl(string $path): string
    {
        return $this->getEndPointBaseUrl() . $path;
    }

    protected function getEndPointBaseUrl(): string
    {
        return $this->getTestMode() ? $this->testEndpointBaseUrl : $this->liveEndpointBaseUrl;
    }

    protected function sendRequest($method, $path, array $data = null)
    {
        if ($data === null) {
            $data = [];
        }

        $data = $this->addAndPrepareDefaultParametersToRequest($data);

        Log::debug('Request', [
            'url' => $this->buildEndPointUrl($path),
            'data' => $data,
            'xml' => $this->dataToXml($data),
        ]);

        $response = $this->httpClient->request(
            $method,
            $this->buildEndPointUrl($path),
            [],
            $this->dataToXml($data)
        );

        $contents = $response->getBody()->getContents();

        $result = $this->xmlToArray($contents);

        Log::debug('Response', [
            'code' => $response->getStatusCode(),
            'body' => $contents,
            'headers' => $response->getHeaders(),
        ]);

        return $this->checkApiResponseForErrors($result);
    }

    protected function checkApiResponseForErrors(array $result): array
    {
        if (isset($result['RESULT']) and $result['RESULT'] === 'ERROR') {
            throw new Exception('Billink: ' . $result['ERROR']['DESCRIPTION']);
        }

        return $result;
    }

    protected function dataToXml(array $data = null): string
    {
        return ArrayToXml::convert(
            array_change_key_case($data, CASE_UPPER),
            'API',
            false
        );
    }

    protected function xmlToArray(string $xml): array
    {
        $object = \simplexml_load_string($xml);

        if ($object === false) {
            throw new InvalidArgumentException('Could not parse XML: ' . $xml);
        }

        return json_decode(json_encode($object), true);
    }

    protected function addAndPrepareDefaultParametersToRequest(array $data): array
    {
        return $this->upperCaseArrayKeys([
            ...$data,
            ...$this->allDefaultParameters(),
        ]);
    }

    protected function upperCaseArrayKeys(array $data): array
    {
        return array_map(function ($item) {
            if (is_array($item)) {
                $item = $this->upperCaseArrayKeys($item);
            }

            return $item;
        }, array_change_key_case($data, CASE_UPPER));
    }
}
