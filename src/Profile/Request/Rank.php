<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:19
 */

namespace XzSoftware\WykopSDK\Profile\Request;


use XzSoftware\WykopSDK\Profile\Builder\ProfilesBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Rank extends GetObject
{
    public function __construct(?int $page = null)
    {
        if (!empty($page)) $this->setPage($page);
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;
    }

    public function getPrefix(): string
    {
        return 'Profiles/Rank/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): ProfilesBuilder
    {
        return new ProfilesBuilder();
    }
}