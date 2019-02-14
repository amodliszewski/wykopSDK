<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 21:00
 */

namespace XzSoftware\WykopSDK\Links\Request;

use XzSoftware\WykopSDK\Links\Builder\VotersBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Downvoters extends GetObject
{
    private $id;

    public function __construct(int $id, ?int $page = null)
    {
        $this->id = $id;
        if (!empty($page)) $this->setPage($page);
    }


    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;

        return $this;
    }


    public function getPrefix(): string
    {
        return 'Links/Downvoters/' . $this->id . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): VotersBuilder
    {
        return new VotersBuilder();
    }
}