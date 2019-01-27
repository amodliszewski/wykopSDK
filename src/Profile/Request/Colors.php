<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 22:32
 */

namespace XzSoftware\WykopSDK\Profile\Request;

use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Colors extends GetObject
{
    public function getPrefix(): string
    {
        return 'Profiles/AvailableColors/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {
        throw new \Exception('Builder not supported for this class');
    }
}