<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 18:02
 */

namespace XzSoftware\WykopSDK\Search;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Search\Request\Entries;
use XzSoftware\WykopSDK\Search\Request\Links;
use XzSoftware\WykopSDK\Search\Request\Profiles;
use XzSoftware\WykopSDK\Search\Response\Entries as EntriesResponse;
use XzSoftware\WykopSDK\Search\Response\Links as LinksResponse;
use XzSoftware\WykopSDK\Search\Response\Users;

class Search
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function searchEntries(Entries $entries): EntriesResponse
    {
        return $entries
            ->getResponseBuilder()
            ->build($this->client->handle($entries));
    }

    public function searchLinks(Links $links): LinksResponse
    {
        return $links
            ->getResponseBuilder()
            ->build($this->client->handle($links));
    }

    public function searchProfiles(Profiles $profiles): Users
    {
        return $profiles
            ->getResponseBuilder()
            ->build($this->client->handle($profiles));
    }
}