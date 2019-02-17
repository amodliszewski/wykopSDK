<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 20:49
 */

namespace XzSoftware\WykopSDK\Suggest\Request;

use XzSoftware\WykopSDK\Suggest\Builder\UsersBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class User extends GetObject
{
    private $user;

    public function __construct(string $user)
    {
        $this->user = $user;
    }
    public function getPrefix(): string
    {
        return 'Suggest/Users/' . $this->user . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): UsersBuilder
    {
        return new UsersBuilder();
    }
}