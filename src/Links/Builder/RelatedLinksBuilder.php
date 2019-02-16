<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 18:47
 */

namespace XzSoftware\WykopSDK\Links\Builder;

use XzSoftware\WykopSDK\Links\Response\RelatedLinks;
use XzSoftware\WykopSDK\ResponseObjects\RelatedLink;

class RelatedLinksBuilder
{
    public function build(array $data): RelatedLinks
    {
        $links = [];
        foreach($data['data'] as $relatedLink)
        {
            $links[] = RelatedLink::buildFromRaw($relatedLink);
        }

        return new RelatedLinks($links);
    }
}