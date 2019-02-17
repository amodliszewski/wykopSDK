<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:31
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Response;

use ArrayIterator;
use IteratorAggregate;
use XzSoftware\WykopSDK\ResponseObjects\User;

class DetailedConversation implements IteratorAggregate
{
    /** @var Message[] */
    private $messages;
    /** @var User */
    private $receiver;

    /**
     * @param Message[] $messages
     * @param User $receiver
     */
    public function __construct(array $messages, User $receiver)
    {
        $this->messages = $messages;
        $this->receiver = $receiver;
    }

    /**
     * @return Message[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @return User
     */
    public function getReceiver(): User
    {
        return $this->receiver;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->messages);
    }
}
