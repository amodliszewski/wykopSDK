<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:20
 */

namespace XzSoftware\WykopSDK\Tags;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Tags\Request\Block;
use XzSoftware\WykopSDK\Tags\Request\Dontnotify;
use XzSoftware\WykopSDK\Tags\Request\Entries;
use XzSoftware\WykopSDK\Tags\Request\Index;
use XzSoftware\WykopSDK\Tags\Request\Links;
use XzSoftware\WykopSDK\Tags\Request\Notify;
use XzSoftware\WykopSDK\Tags\Request\Observe;
use XzSoftware\WykopSDK\Tags\Request\Unblock;
use XzSoftware\WykopSDK\Tags\Request\Unobserve;
use XzSoftware\WykopSDK\Tags\Response\Actions;
use XzSoftware\WykopSDK\Tags\Response\Entries as EntriesResponse;
use XzSoftware\WykopSDK\Tags\Response\Links as LinksResponse;
use XzSoftware\WykopSDK\Tags\Response\Status;

class Tags
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

    public function links(Links $links): LinksResponse
    {
        return $links
            ->getResponseBuilder()
            ->build($this->client->handle($links));
    }

    public function entries(Entries $entries): EntriesResponse
    {
        return $entries
            ->getResponseBuilder()
            ->build($this->client->handle($entries));
    }

    public function observe(Observe $observe): Status
    {
        return $observe
            ->getResponseBuilder()
            ->build($this->client->handle($observe));
    }

    public function unobserve(Unobserve $observe): Status
    {
        return $observe
            ->getResponseBuilder()
            ->build($this->client->handle($observe));
    }

    public function notify(Notify $notify): bool
    {
        $this->client->handle($notify);
        return true;
    }

    public function doNotNotify(Dontnotify $dontnotify): bool
    {
        $this->client->handle($dontnotify);
        return true;
    }

    public function block(Block $observe): Status
    {
        return $observe
            ->getResponseBuilder()
            ->build($this->client->handle($observe));
    }

    public function unblock(Unblock $observe): Status
    {
        return $observe
            ->getResponseBuilder()
            ->build($this->client->handle($observe));
    }
}
