<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 12/02/2019
 * Time: 22:25
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\Entries\Builder\VotesBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class CommentUpvoters extends PostObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getPrefix(): string
    {
        return 'Entries/CommentUpvoters/' . $this->id .'/' ;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): VotesBuilder
    {
        return new VotesBuilder();
    }
}
