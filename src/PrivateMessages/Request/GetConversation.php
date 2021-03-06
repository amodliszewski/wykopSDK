<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:08
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Request;

use XzSoftware\WykopSDK\PrivateMessages\Builder\DetailedConversationBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class GetConversation extends GetObject
{
    /** @var string */
    private $receiver;

    public function __construct(string $receiver)
    {
        $this->receiver = $receiver;
    }

    public function getPrefix(): string
    {
        return 'Pm/Conversation/' . $this->receiver . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): DetailedConversationBuilder
    {
        return new DetailedConversationBuilder();
    }
}