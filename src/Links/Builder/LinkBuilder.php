<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:30
 */

namespace XzSoftware\WykopSDK\Links\Builder;

use XzSoftware\WykopSDK\ResponseObjects\Link;

class LinkBuilder
{
    public function build(array $data): Link
    {
        return Link::buildFromRaw($data['data']);
    }
}