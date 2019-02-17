<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:50
 */

namespace XzSoftware\WykopSDK\Tags\Request;

class Unblock extends Status
{
    public function getPrefix(): string
    {
        return 'Tags/Unblock/' . $this->tag . '/';
    }
}