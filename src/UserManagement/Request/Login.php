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

namespace XzSoftware\WykopSDK\UserManagement\Request;

use XzSoftware\WykopSDK\UserManagement\Builder\LoginBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Login extends PostObject
{
    public function __construct(?string $login, ?string $accountKey = null)
    {
        if (!empty($login)) {
            $this->setLogin($login);
        }

        if (!empty($accountKey)) {
            $this->setAccountKey($accountKey);
        }
    }

    public function getPrefix(): string
    {
        return 'Login/Index/';
    }

    public function getLogin(): string
    {
        return $this->postParams['login'];
    }

    public function setLogin(string $login): self {
        $this->postParams['login'] = $login;

        return $this;
    }

    public function setAccountKey(string $accountKey): self {
        $this->postParams['accountkey'] = $accountKey;

        return $this;
    }

    public function isValid(): bool
    {
        return $this->has('login') && $this->has('accountkey');
    }

    public function getResponseBuilder(): LoginBuilder
    {
        return new LoginBuilder();
    }
}