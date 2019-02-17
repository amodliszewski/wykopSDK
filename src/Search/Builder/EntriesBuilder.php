<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 28/01/2019
 * Time: 18:59
 */

namespace XzSoftware\WykopSDK\Search\Builder;

use XzSoftware\WykopSDK\Search\Response\Entries;
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
            Pagination::buildFromRaw(!empty($data['pagination']) ? $data['pagination'] : [])
        );
    }
}