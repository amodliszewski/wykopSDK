<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 19:02
 */
namespace XzSoftware\WykopSDK\AddLink\Request;

use XzSoftware\WykopSDK\AddLink\Builder\DraftBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Draft extends PostObject
{
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }

    public function setUrl(string $url): self
    {
        $this->postParams['url'] = $url;
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

    public function getResponseBuilder(): DraftBuilder
    {
        return new DraftBuilder();
    }
}