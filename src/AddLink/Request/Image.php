<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 19:45
 */

namespace XzSoftware\WykopSDK\AddLink\Request;

use XzSoftware\WykopSDK\AddLink\Builder\PhotoBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Image extends PostObject
{
    public function __construct(string $key, string $url)
    {
        $this
            ->setDraftKey($key)
            ->setUrl($url);

    }

    public function setUrl(string $url): self
    {
        $this->postParams['url'] = $url;
        return $this;
    }

    public function setDraftKey(string $key): self
    {
        $this->getParams['key'] = $key;
        return $this;
    }

    public function getPrefix(): string
    {
        return 'AddLink/Draft/';
    }

    public function isValid(): bool
    {
        return $this->postParams['url'] === filter_var($this->postParams['url'], FILTER_VALIDATE_URL);
    }

    public function getResponseBuilder(): PhotoBuilder
    {
        return new PhotoBuilder();
    }
}