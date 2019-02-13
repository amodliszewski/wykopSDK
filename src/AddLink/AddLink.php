<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 18:48
 */

namespace XzSoftware\WykopSDK\AddLink;

use XzSoftware\WykopSDK\AddLink\Request\Draft;
use XzSoftware\WykopSDK\AddLink\Request\Image;
use XzSoftware\WykopSDK\AddLink\Request\NewLink;
use XzSoftware\WykopSDK\AddLink\Response\Draft as DraftResponse;
use XzSoftware\WykopSDK\AddLink\Response\Photo;
use XzSoftware\WykopSDK\Client;

class AddLink
{
    /** @var Client */
    private $client;

    public function __construct(Client &$client)
    {
        $this->client = $client;
    }

    public function draft(Draft $draft): DraftResponse
    {
        return $draft
            ->getResponseBuilder()
            ->build($this->client->handle($draft));
    }

    public function addImage(Image $image): Photo
    {
        return $image
            ->getResponseBuilder()
            ->build($this->client->handle($image));
    }

    public function add(NewLink $link)
    {
        return $link
            ->getResponseBuilder()
            ->build($this->client->handle($link));
    }

}