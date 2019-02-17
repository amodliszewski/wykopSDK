<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:51
 */

namespace XzSoftware\WykopSDK\Tags\Builder;

use XzSoftware\WykopSDK\Tags\Response\Status;

class StatusBuilder
{
    public function build(array $data): Status
    {
        return new Status($data['data']['is_observed'], $data['data']['is_blocked']);
    }
}