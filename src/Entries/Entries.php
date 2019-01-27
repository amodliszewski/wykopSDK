<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:46
 */

namespace XzSoftware\WykopSDK\Entries;

use XzSoftware\WykopSDK\Client;

class Entries
{
    private $client;

    public function __construct(Client &$client)
    {
        $this->client = $client;
    }

}