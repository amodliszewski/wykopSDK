<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:18
 */

namespace XzSoftware\WykopSDK\Links\Request;

use XzSoftware\WykopSDK\Links\Builder\LinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

abstract class PaginatedLinkList extends GetObject
{
    public function __construct(int $page = null)
    {
        if (!empty($page)) $this->setPage($page);
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;

        return $this;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): LinksBuilder
    {
        return new LinksBuilder();
    }
}