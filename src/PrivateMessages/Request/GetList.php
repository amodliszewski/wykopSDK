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

use XzSoftware\WykopSDK\PrivateMessages\Builder\ConversationsBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class GetList extends GetObject
{

    public function getPrefix(): string
    {
        return 'Pm/ConversationsList/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): ConversationsBuilder
    {
        return new ConversationsBuilder();
    }
}