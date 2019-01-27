<?php
declare(strict_types=1);

/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 18:47
 */

namespace XzSoftware\WykopSDK\Profile\Request;

use XzSoftware\WykopSDK\Profile\Builder\ProfileBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Profile extends GetObject
{
    private $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function setLogin(string $login): self {
        $this->login = $login;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Profiles/Index/' . $this->login . '/';
    }

    public function isValid(): bool
    {
        return !empty($this->login);
    }

    public function getResponseBuilder(): ProfileBuilder
    {
        return new ProfileBuilder();
    }
}