<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:44
 */

namespace XzSoftware\WykopSDK\Tags\Builder;

use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\Tags\Response\Entries;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class EntriesBuilder
{
    public function build(array $data): Entries
    {
        $links = [];
        foreach($data['data'] as $link) {
            $links[] = Entry::buildFromRaw($link);
        }

        return new Entries(
            $links,
            Pagination::buildFromRaw(!empty($data['pagination']) ? $data['pagination'] : [])
        );
    }
}