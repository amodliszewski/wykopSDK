<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:40
 */

namespace XzSoftware\WykopSDK\MyWykop\Builder;

use XzSoftware\WykopSDK\MyWykop\Response\Links;
use XzSoftware\WykopSDK\ResponseObjects\Link;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class LinksBuilder
{
    public function build(array $data): Links
    {
        $links = [];
        foreach($data['data'] as $link) {
            $links[] = Link::buildFromRaw($link);
        }

        return new Links(
            $links,
            Pagination::buildFromRaw(!empty($data['pagination']) ? $data['pagination'] : [])
        );
    }
}