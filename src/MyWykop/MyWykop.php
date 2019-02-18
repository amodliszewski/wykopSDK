<?php
declare(strict_types=1);

/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:04
 */

namespace XzSoftware\WykopSDK\MyWykop;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\MyWykop\Request\Entries;
use XzSoftware\WykopSDK\MyWykop\Request\Index;
use XzSoftware\WykopSDK\MyWykop\Request\Links;
use XzSoftware\WykopSDK\MyWykop\Request\Tags;
use XzSoftware\WykopSDK\MyWykop\Request\Users;
use XzSoftware\WykopSDK\ResponseObjects\Actions;
use XzSoftware\WykopSDK\ResponseObjects\Entries as EntriesResponse;
use XzSoftware\WykopSDK\ResponseObjects\Links as LinksResponse;

class MyWykop
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index(Index $index): Actions
    {
        return $index
            ->getResponseBuilder()
            ->build($this->client->handle($index));
    }

    public function tags(Tags $tags): Actions
    {
        return $tags
            ->getResponseBuilder()
            ->build($this->client->handle($tags));
    }

    public function users(Users $users): Actions
    {
        return $users
            ->getResponseBuilder()
            ->build($this->client->handle($users));
    }

    public function entries(Entries $entries): EntriesResponse
    {
        return $entries
            ->getResponseBuilder()
            ->build($this->client->handle($entries));
    }

    public function links(Links $links): LinksResponse
    {
        return $links
            ->getResponseBuilder()
            ->build($this->client->handle($links));
    }
}