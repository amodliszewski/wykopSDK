<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 17:53
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\Entries\Builder\EntryBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class GetComment extends GetObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getPrefix(): string
    {
        return 'Entries/Comment/' . $this->id . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): EntryBuilder
    {
        return new EntryBuilder();
    }
}