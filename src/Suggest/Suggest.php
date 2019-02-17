<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 20:45
 */

namespace XzSoftware\WykopSDK\Suggest;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Suggest\Request\Tag;
use XzSoftware\WykopSDK\Suggest\Request\User;
use XzSoftware\WykopSDK\Suggest\Response\Users;

class Suggest
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function tags(string $tag)
    {
        $tag = new Tag($tag);

        return $tag
            ->getResponseBuilder()
            ->build($this->client->handle($tag));
    }

    public function username(string $username): Users
    {
        $user = new User($username);
        return $user
            ->getResponseBuilder()
            ->build($this->client->handle($user));
    }
}