<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:01
 */

namespace XzSoftware\WykopSDK\Profile\Request;

use XzSoftware\WykopSDK\Builders\UsersBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Followers extends GetObject
{
    private $login;

    public function __construct(string $login, ?int $page = null)
    {
        $this->login = $login;
        if (!empty($page)) $this->setPage($page);
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;
    }

    public function getPrefix(): string
    {
        return 'Profiles/Followers/' . $this->login . '/';
    }

    public function isValid(): bool
    {
        return !empty($this->login);
    }

    public function getResponseBuilder(): UsersBuilder
    {
        return new UsersBuilder();
    }
}