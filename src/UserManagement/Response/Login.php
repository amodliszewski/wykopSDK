<?php
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 17:26
 */

namespace XzSoftware\WykopSDK\UserManagement\Response;

use XzSoftware\WykopSDK\ResponseObjects\User;

class Login
{
    /** @var User */
    private $profile;
    /** @var string */
    private $userKey;
    /** @var array */
    private $options;

    public function __construct(User $profile, string $userKey, array $options)
    {
        $this->profile = $profile;
        $this->userKey = $userKey;
        $this->options = $options;
    }

    public function getProfile(): User
    {
        return $this->profile;
    }

    public function getUserKey(): string
    {
        return $this->userKey;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}