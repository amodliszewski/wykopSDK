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

namespace XzSoftware\WykopSDK\Links\Request;

abstract class CommentVote extends Vote
{
    /** @var int */
    protected $commentId;

    public function __construct(int $linkId, int $commentId)
    {
        parent::__construct($linkId);
        $this->commentId = $commentId;
    }

    public function isValid(): bool
    {
        return true;
    }
}