<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 18:12
 */

namespace XzSoftware\WykopSDK\Hits;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Hits\Request\Hits as HitsRequest;
use XzSoftware\WykopSDK\Hits\Response\Hits as HitsResponse;

class Hits
{
    /** @var Client */
    private $client;

    public function __construct(Client &$client)
    {
        $this->client = $client;
    }

    public function getHits(HitsRequest $hits): HitsResponse
    {
        return $hits
            ->getResponseBuilder()
            ->build($this->client->handle($hits));
    }
}