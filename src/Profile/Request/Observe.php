<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 22:24
 */

namespace XzSoftware\WykopSDK\UserManagement\Request;

use XzSoftware\WykopSDK\Profile\Builder\StatusBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Observe extends PostObject
{
    private $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Profiles/Observe/' . $this->login . '/';
    }

    public function isValid(): bool
    {
        return $this->has('login');
    }

    public function getResponseBuilder(): StatusBuilder
    {
        return new StatusBuilder();
    }
}