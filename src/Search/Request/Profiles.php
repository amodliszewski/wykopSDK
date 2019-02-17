<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 18:07
 */

namespace XzSoftware\WykopSDK\Search\Request;

use XzSoftware\WykopSDK\RequestObjects\PostObject;
use XzSoftware\WykopSDK\Search\Builder\ProfilesBuilder;

class Profiles extends PostObject
{
    public function __construct(string $query) {
        $this->setQuery($query);
    }

    public function setQuery(string $query): self
    {
        $this->postParams['q'] = $query;
        return $this;
    }

    public function getPrefix(): string
    {
        return 'Search/Profiles/';
    }

    public function isValid(): bool
    {
        return strlen($this->postParams['q']) > 3;
    }

    public function getResponseBuilder(): ProfilesBuilder
    {
        return new ProfilesBuilder();
    }
}