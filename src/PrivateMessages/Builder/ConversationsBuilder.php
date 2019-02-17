<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:23
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Builder;

use XzSoftware\WykopSDK\PrivateMessages\Response\Conversation;
use XzSoftware\WykopSDK\PrivateMessages\Response\Conversations;

class ConversationsBuilder
{
    public function build(array $data): Conversations
    {
        $conversations = [];
        foreach ($data['data'] as $conversation)
        {
            $conversations[] = Conversation::buildFromRaw($conversation);
        }

        return new Conversations($conversations);
    }
}