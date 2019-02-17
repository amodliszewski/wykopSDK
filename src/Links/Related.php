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
use XzSoftware\WykopSDK\Links\Request\Related\Add;
use XzSoftware\WykopSDK\Links\Request\Related\GetAll;
use XzSoftware\WykopSDK\Links\Request\Related\Vote;
use XzSoftware\WykopSDK\Links\Response\RelatedLinks;
use XzSoftware\WykopSDK\Links\Response\Votes;
use XzSoftware\WykopSDK\ResponseObjects\RelatedLink;

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

    public function get(GetAll $getRelated): RelatedLinks
    {
        return $getRelated
            ->getResponseBuilder()
            ->build($this->client->handle($getRelated));
    }

    public function add(Add $related): RelatedLink
    {
        return $related
            ->getResponseBuilder()
            ->build($this->client->handle($related));
    }

    public function vote(Vote $vote): int
    {
        $data = $this->client->handle($vote);
        return $data['data']['vote_count'];
    }
}