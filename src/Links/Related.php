<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:04
 */

namespace XzSoftware\WykopSDK\Links;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Links\Request\GetRelated;
use XzSoftware\WykopSDK\Links\Response\RelatedLinks;

class Related
{
    /** @var Client */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(GetRelated $getRelated): RelatedLinks
    {
        $getRelated
            ->getResponseBuilder()
            ->build($this->client->handle($getRelated));
    }

    public function add()
    {

    }

    public function voteUp(){}
    public function voteDown(){}
}