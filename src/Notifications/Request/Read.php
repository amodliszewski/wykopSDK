<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 16:25
 */

namespace XzSoftware\WykopSDK\Notifications\Request;

use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Read extends GetObject
{
    /** @var int */
    private $notificationId;

    public function __construct(int $notificationId)
    {
        $this->notificationId = $notificationId;
    }

    public function setNotificationId(int $notificationId): self
    {
        $this->notificationId = $notificationId;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Notifications/MarkAsRead/' . $this->notificationId . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {
        throw new \Exception('This class does not support Response Builder');
    }
}