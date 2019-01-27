<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 12:59
 */

namespace XzSoftware\WykopSDK\RequestObjects;

abstract class GetObject extends AbstractObject
{
    public function setAppKey(string $appKey): void
    {
        $this->urlParams['appkey'] = $appKey;
    }

    public function setUserKey(string $userKey): void
    {
        $this->urlParams['userkey'] = $userKey;
    }
}
