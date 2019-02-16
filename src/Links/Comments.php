<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:04
 */

namespace XzSoftware\WykopSDK\Links;

use XzSoftware\WykopSDK\Client;

use XzSoftware\WykopSDK\Links\Request\CommentAdd;
use XzSoftware\WykopSDK\Links\Request\CommentEdit;
use XzSoftware\WykopSDK\Links\Request\CommentVote;
use XzSoftware\WykopSDK\Links\Request\GetAll;
use XzSoftware\WykopSDK\Links\Request\GetComment;
use XzSoftware\WykopSDK\Links\Response\Comments as CommentsResponse;
use XzSoftware\WykopSDK\Links\Response\Votes;
use XzSoftware\WykopSDK\ResponseObjects\Comment;

class Comments
{
    /** @var Client */
    private $client;

    /**
     * Links constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAll(GetAll $all): CommentsResponse
    {
        return $all
            ->getResponseBuilder()
            ->build($this->client->handle($all));
    }

    public function vote(CommentVote $commentVote): Votes
    {
        return $commentVote
            ->getResponseBuilder()
            ->build($this->client->handle($commentVote));
    }

    public function add(CommentAdd $add): Comment
    {
        return $add
            ->getResponseBuilder()
            ->build($this->client->handle($add));
    }

    public function edit(CommentEdit $edit): Comment
    {
        return $edit
            ->getResponseBuilder()
            ->build($this->client->handle($edit));
    }

    public function get(GetComment $comment): Comment
    {
        return $comment
            ->getResponseBuilder()
            ->build($this->client->handle($comment));
    }

}