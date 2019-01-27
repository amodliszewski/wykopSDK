<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 15:12
 */

namespace XzSoftware\WykopSDK\RequestObjects;

abstract class AbstractObject implements ApiObjectInterface
{
    /** @var array POST Params */
    protected $postParams = [];
    /** @var array url Params */
    protected $urlParams = [];
    /** @var array GET Params */
    protected $getParams = [];

    public function getSignerData(): array
    {
        $data = $this->postParams;
        ksort($data);
        return array_values($data);
    }

    public function setFullDataMode()
    {
        $this->urlParams['data'] = 'full';
    }

    public function setCompactedDataMode()
    {
        unset($this->urlParams['data']);
    }

    public function has($param): bool
    {
        return !empty($this->postParams[$param]) || !empty($this->urlParams[$param]);
    }

    public function getPostParams(): array
    {
        $params = $this->postParams;
        ksort($params);
        return $params;
    }

    public function getUrlParams(bool $prepared = false): array
    {
        $params = $this->urlParams;
        if ($prepared) {
            ksort($params);

            array_walk($params, function (&$value, $key) {
                $value = $key . '/' . $value;
            });
        }
        return $params;
    }

    public function getEndpoint(): string
    {
        $params = $this->getUrlParams(true);
        $urlParams = empty($params) ? '' : implode('/', $params) . '/';
        return $this->getPrefix() . $urlParams;
    }

    public abstract function getPrefix(): string;
}
