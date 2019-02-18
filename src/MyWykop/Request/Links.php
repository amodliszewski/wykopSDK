<?php
declare(strict_types=1);

/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 15:06
 */

namespace XzSoftware\WykopSDK\MyWykop\Request;

use XzSoftware\WykopSDK\Builders\LinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Links extends GetObject
{
    public function __construct(int $page = null)
    {
        if (!empty($page)) {
            $this->setPage($page);
        }
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;
        return $this;
    }

    public function getPrefix(): string
    {
        return 'Mywykop/Links/';
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