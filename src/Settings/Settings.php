<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 20:28
 */

namespace XzSoftware\WykopSDK\Settings;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\ResponseObjects\User;
use XzSoftware\WykopSDK\Settings\Request\Avatar;
use XzSoftware\WykopSDK\Settings\Request\Background;
use XzSoftware\WykopSDK\Settings\Request\Profile;

class Settings
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function profile(Profile $profile): User
    {
        $data = $this->client->handle($profile);

        return User::buildFromRaw($data['data']);
    }

    public function avatar(Avatar $avatar): User
    {
        $data = $this->client->handle($avatar);

        return User::buildFromRaw($data['data']);
    }

    public function background(Background $background): User
    {
        $data = $this->client->handle($background);

        return User::buildFromRaw($data['data']);
    }
}