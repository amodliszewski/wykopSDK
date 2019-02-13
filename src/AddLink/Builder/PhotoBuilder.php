<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 20:48
 */

namespace XzSoftware\WykopSDK\AddLink\Builder;

use XzSoftware\WykopSDK\AddLink\Response\Photo;

class PhotoBuilder
{
    public function build(array $data): Photo
    {
        return new Photo($data['data']['key'], $data['data']['source_url']);
    }
}