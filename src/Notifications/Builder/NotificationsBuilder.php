<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 15:57
 */

namespace XzSoftware\WykopSDK\Notifications\Builder;

use XzSoftware\WykopSDK\Notifications\Response\Notifications;
use XzSoftware\WykopSDK\ResponseObjects\Notification;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class NotificationsBuilder
{
    public function build($data)
    {
        $notifications = [];
        foreach ($data['data'] as $notification) {
            $notifications[] = Notification::buildFromRaw($notification);
        }

        return new Notifications(
            $notifications,
            Pagination::buildFromRaw(!empty($data['pagination']) ? $data['pagination'] : [])
        );
    }
}
