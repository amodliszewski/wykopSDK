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

class Popular extends Hits
{
    public function getPrefix(): string
    {
        return 'Hits/Popular/';
    }
}