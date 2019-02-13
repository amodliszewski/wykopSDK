<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 18:59
 */

namespace XzSoftware\WykopSDK\Entries\Builder;

use XzSoftware\WykopSDK\Entries\Response\Entries;
use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class EntryBuilder
{
    public function build(array $data): Entry
    {
        return Entry::buildFromRaw($data['data']);
    }
}