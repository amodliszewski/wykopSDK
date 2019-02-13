<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 19:15
 */

namespace XzSoftware\WykopSDK\AddLink\Builder;

use XzSoftware\WykopSDK\AddLink\Response\Draft;
use XzSoftware\WykopSDK\ResponseObjects\Link;

class DraftBuilder
{
    public function build(array $data): Draft
    {
        $duplicates = [];
        foreach ($data['duplicates'] as $duplicate)
        {
            $duplicates[] = Link::buildFromRaw($duplicate);
        }


        return new Draft($data['data']['key'], $data['data']['title'], $data['data']['source_url'], $duplicates);
    }
}