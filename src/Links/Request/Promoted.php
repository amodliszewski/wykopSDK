<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:18
 */

namespace XzSoftware\WykopSDK\Links\Request;

class Promoted extends PaginatedLinkList
{
    public function getPrefix(): string
    {
        return 'Links/Promoted/';
    }
}