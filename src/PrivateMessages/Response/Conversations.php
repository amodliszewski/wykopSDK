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

use ArrayIterator;
use IteratorAggregate;

class Conversations implements IteratorAggregate
{
    /** @var Conversation[] */
    private $conversations;

    /**
     * Conversations constructor.
     * @param Conversation[] $conversations
     */
    public function __construct(array $conversations)
    {
        $this->conversations = $conversations;
    }

    /**
     * @return Conversation[]
     */
    public function getConversations(): array
    {
        return $this->conversations;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->getConversations());
    }
}