<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:27
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Builder;

use XzSoftware\WykopSDK\PrivateMessages\Response\DetailedConversation;
use XzSoftware\WykopSDK\PrivateMessages\Response\Message;
use XzSoftware\WykopSDK\ResponseObjects\User;

class DetailedConversationBuilder
{
    public function build(array $data): DetailedConversation
    {
        $messages = [];
        foreach ($data['data'] as $message) {
            $messages[] = Message::buildFromRaw($message);
        }

        return new DetailedConversation($messages, User::buildFromRaw($data['receiver']));
    }
}