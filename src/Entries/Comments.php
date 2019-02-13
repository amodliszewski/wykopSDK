<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 18:15
 */

namespace XzSoftware\WykopSDK\Entries;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Entries\Request\AddComment;
use XzSoftware\WykopSDK\Entries\Request\CommentVoteRemove;
use XzSoftware\WykopSDK\Entries\Request\CommentVoteUp;
use XzSoftware\WykopSDK\Entries\Request\EditComment;
use XzSoftware\WykopSDK\Entries\Request\GetComment;
use XzSoftware\WykopSDK\Entries\Request\ObservedComments;
use XzSoftware\WykopSDK\Entries\Response\Entries;
use XzSoftware\WykopSDK\Entries\Response\Votes;
use XzSoftware\WykopSDK\ResponseObjects\Entry;

class Comments
{
    private $client;

    public function __construct(Client &$client)
    {
        $this->client = $client;
    }

    public function get(int $id): Entry
    {
        $comment = new GetComment($id);
        return $comment
            ->getResponseBuilder()
            ->build($this->client->handle($comment));
    }

    public function add(AddComment $addComment): Entry
    {
        return $addComment
            ->getResponseBuilder()
            ->build($this->client->handle($addComment));
    }

    public function edit(EditComment $editComment): Entry
    {
        return $editComment
            ->getResponseBuilder()
            ->build($this->client->handle($editComment));
    }

    public function voteUp(int $id): Votes
    {
        $vote = new CommentVoteUp($id);
        return $vote
            ->getResponseBuilder()
            ->build($this->client->handle($vote));
    }

    public function voteRemove(int $id): Votes
    {
        $vote = new CommentVoteRemove($id);
        return $vote
            ->getResponseBuilder()
            ->build($this->client->handle($vote));
    }

    public function getObserved(ObservedComments $observedComments): Entries
    {
        return $observedComments
            ->getResponseBuilder()
            ->build($this->client->handle($observedComments));
    }


}