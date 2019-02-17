<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:10
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Response;

use XzSoftware\WykopSDK\ResponseObjects\User;

class Conversation
{
    /** @var \DateTime */
    private $lastUpdate;
    /** @var User */
    private $receiver;
    /** @var string */
    private $status;

    public function __construct(\DateTime $lastUpdate, User $receiver, string $status)
    {
        $this->lastUpdate = $lastUpdate;
        $this->receiver = $receiver;
        $this->status = $status;
    }

    public static function buildFromRaw(array $data): self
    {
        return new Conversation(
            new \DateTime($data['last_update']),
            User::buildFromRaw($data['receiver']),
            $data['status']
        );
    }

    public function getLastUpdate(): \DateTime
    {
        return $this->lastUpdate;
    }

    public function getReceiver(): User
    {
        return $this->receiver;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

}
