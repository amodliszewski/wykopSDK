<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 18:02
 */

namespace XzSoftware\WykopSDK\UserManagement\Builder;

use XzSoftware\WykopSDK\ResponseObjects\User;
use XzSoftware\WykopSDK\UserManagement\Response\Login;


class LoginBuilder
{
    public function build(array $data): Login
    {
        return new Login(
            User::buildFromRaw($data['data']['profile']),
            $data['data']['userkey'],
            $data['data']['profile']
        );
    }
}