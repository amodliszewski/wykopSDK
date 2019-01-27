<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 18:10
 */

namespace XzSoftware\WykopSDK\Profile\Builder;

use XzSoftware\WykopSDK\Profile\Response\Links;
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
            Pagination::buildFromRaw($data['pagination'])
        );
    }
}