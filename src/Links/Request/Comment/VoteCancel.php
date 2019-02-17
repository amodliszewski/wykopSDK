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

class VoteCancel extends Vote
{
    public function getPrefix(): string
    {
        return 'Links/CommentVoteCancel/' . $this->id . '/' . $this->commentId . '/';
    }
}