<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 19:05
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\Builders\EntriesBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class ObservedComments extends GetObject
{

    public function __construct(int $period = null, int $page = null)
    {
        if (!empty($period)) $this->setPeriod($period);
        if (!empty($page)) $this->setPage($page);
    }

    public function setPeriod(int $period): self
    {
        $this->urlParams['period'] = $period;

        return $this;
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Entries/ObservedComments/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): EntriesBuilder
    {
        return new EntriesBuilder();
    }
}