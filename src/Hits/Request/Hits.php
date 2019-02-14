<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 18:15
 */

namespace XzSoftware\WykopSDK\Hits\Request;

use XzSoftware\WykopSDK\Hits\Builder\HitsBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

abstract class Hits extends GetObject
{
    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): HitsBuilder
    {
        return new HitsBuilder();
    }
}