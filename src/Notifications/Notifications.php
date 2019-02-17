<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 15:13
 */

namespace XzSoftware\WykopSDK\Notifications;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Notifications\Request\Count;
use XzSoftware\WykopSDK\Notifications\Request\Read;
use XzSoftware\WykopSDK\Notifications\Request\ReadAll;
use XzSoftware\WykopSDK\Notifications\Request\TagNotifications;
use XzSoftware\WykopSDK\Notifications\Request\TotalNotifications;
use XzSoftware\WykopSDK\Notifications\Request\UserNotifications;
use XzSoftware\WykopSDK\Notifications\Response\Notifications as NotificationsResponse;

class Notifications
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getUserNotifications(UserNotifications $notifications): NotificationsResponse
    {
        $notifications
            ->getResponseBuilder()
            ->build($this->client->handle());
    }

    public function getUserNotificationsCount(): int
    {
        $count = new Count(Count::USER_COUNT);
        return (int) $this->client->handle($count)['data']['count'];
    }

    public function getTagNotifications(TagNotifications $tagNotifications): NotificationsResponse
    {
        return $tagNotifications
            ->getResponseBuilder()
            ->build($this->client->handle($tagNotifications));
    }

    public function getTagNotificationsCount(): int
    {
        $count = new Count(Count::TAG_COUNT);
        return (int) $this->client->handle($count)['data']['count'];
    }

    public function getTotalNotifications(TotalNotifications $totalNotifications): NotificationsResponse
    {
        return $totalNotifications
            ->getResponseBuilder()
            ->build($this->client->handle($totalNotifications));
    }

    public function getTotalNotificationsCount(): int
    {
        $count = new Count(Count::TOTAL_COUNT);
        return (int) $this->client->handle($count)['data']['count'];
    }

    public function readUserNotifications(): bool
    {
        $read = new ReadAll(ReadAll::READ_USER);
        $this->client->handle($read);
        return true;
    }

    public function readTagNotifications(): bool
    {
        $read = new ReadAll(ReadAll::READ_TAG);
        $this->client->handle($read);
        return true;
    }

    public function readAllNotifications(): bool
    {
        $read = new ReadAll(ReadAll::READ_ALL);
        $this->client->handle($read);
        return true;
    }

    public function readNotification(Read $read): bool
    {
        $this->client->handle($read);
        return true;
    }
}