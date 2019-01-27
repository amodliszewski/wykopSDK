<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 18:52
 */

namespace XzSoftware\WykopSDK\Profile\Builder;

use XzSoftware\WykopSDK\Profile\Response\Entries;
use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class EntriesBuilder
{
    public function build(array $data): Entries
    {
        $entries = [];
        foreach($data['data'] as $entry) {
            $entries[] = Entry::buildFromRaw($entry);
        }

        return new Entries(
            $entries,
            Pagination::buildFromRaw($data['pagination'])
        );
    }
}