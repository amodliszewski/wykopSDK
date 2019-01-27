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

namespace XzSoftware\WykopSDK\Profile\Builder;

use XzSoftware\WykopSDK\ResponseObjects\User;

class ProfileBuilder
{
    public function build(array $data): User
    {
        return User::buildFromRaw($data['data']);
    }
}