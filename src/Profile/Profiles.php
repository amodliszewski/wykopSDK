<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 18:59
 */

namespace XzSoftware\WykopSDK\Profile;

use XzSoftware\WykopSDK\Client;

use XzSoftware\WykopSDK\Profile\Request\Actions;
use XzSoftware\WykopSDK\Profile\Request\Profile;
use XzSoftware\WykopSDK\Profile\Response\Actions as ActionsResponse;
use XzSoftware\WykopSDK\ResponseObjects\User;

class Profiles {
    private $client;

    public function __construct(Client &$client)
    {
        $this->client = $client;
    }

    public function getProfile(Profile $profile): User
    {
        return $profile
            ->getResponseBuilder()
            ->build($this->client->handle($profile));
    }

    public function getActions(Actions $actions): ActionsResponse
    {
        return $actions
            ->getResponseBuilder()
            ->build($this->client->handle($actions));
    }
};