<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 21:59
 */

namespace XzSoftware\WykopSDK\Profile\Builder;

use XzSoftware\WykopSDK\Profile\Response\Related;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\RelatedLink;

class RelatedLinksBuilder
{
    public function build(array $data): Related
    {
        $links = [];
        foreach($data['data'] as $link) {
            $links[] = RelatedLink::buildFromRaw($link);
        }

        return new Related(
            $links,
            Pagination::buildFromRaw($data['pagination'])
        );
    }
}