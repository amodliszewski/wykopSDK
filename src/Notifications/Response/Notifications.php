<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 16:00
 */

namespace XzSoftware\WykopSDK\Notifications\Response;

use XzSoftware\WykopSDK\ResponseObjects\Notification;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class Notifications
{
    /** @var Notification[] */
    private $notifications;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $notifications, Pagination $pagination)
    {
        $this->notifications = $notifications;
        $this->pagination = $pagination;
    }

    public function getNotifications(): array
    {
        return $this->notifications;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}