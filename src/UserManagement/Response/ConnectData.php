<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 14:54
 */

namespace XzSoftware\WykopSDK\UserManagement\Response;

class ConnectData
{
    /** @var string */
    private $appKey;
    /** @var string */
    private $login;
    /** @var string */
    private $token;

    public function __construct(string $appKey, string $login, string $token)
    {
        $this->appKey = $appKey;
        $this->login = $login;
        $this->token = $token;
    }

    public function getAppKey(): string
    {
        return $this->appKey;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
