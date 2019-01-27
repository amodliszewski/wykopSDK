<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 18:57
 */

namespace XzSoftware\WykopSDK\UserManagement;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Exceptions\IncorrectAuthDataException;
use XzSoftware\WykopSDK\UserManagement\Request\Login;
use XzSoftware\WykopSDK\UserManagement\Response\ConnectData;
use XzSoftware\WykopSDK\UserManagement\Response\Login as LoginResponse;

class UserManagement {
    private $client;

    public function __construct(Client &$client)
    {
        $this->client = $client;
    }

    /**
     * LogIn user, returns login response
     *
     * @throws \XzSoftware\WykopSDK\Exceptions\ValidationException
     */
    public function logIn(Login $loginData): LoginResponse
    {
        $response = $loginData
            ->getResponseBuilder()
            ->build($this->client->handle($loginData));
        $this->client->setLogin($loginData->getLogin())->setToken($response->getUserKey());

        return $response;
    }

    /**
     * Returns string that represents connection endpoint for specified application key
     */
    public function getConnectLink(?string $redirectUrl = null): string
    {
        return $this->client->getConnectLink($redirectUrl);
    }

    /**
     * Returns object with token, login and appkey
     *
     * @throws IncorrectAuthDataException
     */
    public function getAuthFromConnectData(string $dataString): ConnectData
    {
        $raw = json_decode(base64_decode($dataString), true);
        $connectData = new ConnectData($raw['appkey'], $raw['login'], $raw['token']);
        if (!$this->client->checkAppKey($connectData->getAppKey())) {
            throw new IncorrectAuthDataException();
        }


        return $connectData;
    }

    /**
     * Authenticates user for further use within SDK
     */
    public function authUser(string $login, string $token)
    {
        $this->client->setLogin($login)->setToken($token);
    }
};