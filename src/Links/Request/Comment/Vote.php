<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:26
 */

namespace XzSoftware\WykopSDK\Links\Request\Comment;

use XzSoftware\WykopSDK\Links\Builder\CommentVoteBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

abstract class Vote extends GetObject
{
    /** @var int */
    protected $commentId;
    /** @var int */
    protected $id;

    public function __construct(int $linkId, int $commentId)
    {
        $this->id = $linkId;
        $this->commentId = $commentId;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): CommentVoteBuilder
    {
        return new CommentVoteBuilder();
    }
}