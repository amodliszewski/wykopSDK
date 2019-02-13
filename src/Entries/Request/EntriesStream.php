<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 28/01/2019
 * Time: 18:55
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\Entries\Builder\EntriesBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class EntriesStream extends GetObject
{

    public function __construct(int $id = null, int $page = null)
    {
        if (!empty($id)) $this->setId($id);
        if (!empty($page)) $this->setPage($page);
    }

    public function setId(int $id): self
    {
        $this->urlParams['firstid'] = $id;

        return $this;
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Entries/Stream/';
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