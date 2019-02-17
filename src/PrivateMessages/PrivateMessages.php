<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:06
 */

namespace XzSoftware\WykopSDK\PrivateMessages;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\PrivateMessages\Request\DeleteConversation;
use XzSoftware\WykopSDK\PrivateMessages\Request\GetConversation;
use XzSoftware\WykopSDK\PrivateMessages\Request\GetList;
use XzSoftware\WykopSDK\PrivateMessages\Request\Message;
use XzSoftware\WykopSDK\PrivateMessages\Response\Conversations;
use XzSoftware\WykopSDK\PrivateMessages\Response\DetailedConversation;
use XzSoftware\WykopSDK\PrivateMessages\Response\Message as MessageResponse;

class PrivateMessages
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getConversationsList(): Conversations
    {
        $list = new GetList();

        return $list
            ->getResponseBuilder()
            ->build($this->client->handle($list));
    }

    public function getConversation(string $user): DetailedConversation
    {
        $conversation = new GetConversation($user);
        return $conversation
            ->getResponseBuilder()
            ->build($this->client->handle($conversation));
    }

    public function sendMessage(Message $msg): MessageResponse
    {
        $data = $this->client->handle($msg);
        return MessageResponse::buildFromRaw($data['data']);
    }

    public function deleteConversation(string $user): bool
    {
        $this->client->handle(new DeleteConversation($user));
        return true;
    }
}