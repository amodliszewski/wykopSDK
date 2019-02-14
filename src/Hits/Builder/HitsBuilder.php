<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 18:14
 */

namespace XzSoftware\WykopSDK\Hits\Builder;

use XzSoftware\WykopSDK\Hits\Response\Hits;
use XzSoftware\WykopSDK\ResponseObjects\Link;

class HitsBuilder
{
    public function build(array $data): Hits
    {
        $links = [];
        foreach($data['data'] as $link) {
            $links[] = Link::buildFromRaw($link);
        }

        return new Hits(
            $links
        );
    }
}