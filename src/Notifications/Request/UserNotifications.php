<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 15:36
 */

namespace XzSoftware\WykopSDK\Notifications\Request;

use XzSoftware\WykopSDK\Notifications\Builder\NotificationsBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class UserNotifications extends GetObject
{
    public function __construct(int $page = null)
    {
        if (!empty($page)) {
            $this->setPage($page);
        }
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Notifications/Index/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): NotificationsBuilder
    {
        return new NotificationsBuilder();
    }
}
