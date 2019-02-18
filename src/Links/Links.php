<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 18:57
 */

namespace XzSoftware\WykopSDK\Links;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Links\Request\Downvoters;
use XzSoftware\WykopSDK\Links\Request\Favourite;
use XzSoftware\WykopSDK\Links\Request\GetLink;
use XzSoftware\WykopSDK\Links\Request\Observed;
use XzSoftware\WykopSDK\Links\Request\Promoted;
use XzSoftware\WykopSDK\Links\Request\Top;
use XzSoftware\WykopSDK\Links\Request\Upcoming;
use XzSoftware\WykopSDK\Links\Request\Upvoters;
use XzSoftware\WykopSDK\Links\Request\Vote;
use XzSoftware\WykopSDK\Links\Response\Voters;
use XzSoftware\WykopSDK\Links\Response\Votes;
use XzSoftware\WykopSDK\ResponseObjects\Link;
use XzSoftware\WykopSDK\ResponseObjects\Links as LinksResponse;

class Links
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function promoted(Promoted $promoted): LinksResponse
    {
        return $promoted
            ->getResponseBuilder()
            ->build($this->client->handle($promoted));
    }

    public function upcoming(Upcoming $upcoming): LinksResponse
    {
        return $upcoming
            ->getResponseBuilder()
            ->build($this->client->handle($upcoming));
    }

    public function observed(Observed $observed): LinksResponse
    {
        return $observed
            ->getResponseBuilder()
            ->build($this->client->handle($observed));
    }

    public function getLink(GetLink $link): Link
    {
        return $link
            ->getResponseBuilder()
            ->build($this->client->handle($link));
    }

    public function vote(Vote $vote): Votes
    {
        return $vote
            ->getResponseBuilder()
            ->build($this->client->handle($vote));
    }

    public function upvoters(Upvoters $voters): Voters
    {
        return $voters
            ->getResponseBuilder()
            ->build($this->client->handle($voters));
    }

    public function downvoters(Downvoters $voters): Voters
    {
        return $voters
            ->getResponseBuilder()
            ->build($this->client->handle($voters));
    }

    public function top(Top $top): LinksResponse
    {
        return $top
            ->getResponseBuilder()
            ->build($this->client->handle($top));
    }

    public function favorite(int $id) : bool
    {
        $fav = new Favourite($id);
        $data = $this->client->handle($fav);
        return $data['data'][0];
    }

    public function comments(): Comments
    {
        return new Comments($this->client);
    }

    public function related(): Related
    {
        return new Related($this->client);
    }
}