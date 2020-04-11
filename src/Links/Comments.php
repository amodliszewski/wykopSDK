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

use XzSoftware\WykopSDK\Links\Request\Comment\Add;
use XzSoftware\WykopSDK\Links\Request\Comment\Edit;
use XzSoftware\WykopSDK\Links\Request\Comment\Vote;
use XzSoftware\WykopSDK\Links\Request\Comment\Get;
use XzSoftware\WykopSDK\Links\Request\Comment\GetAll;
use XzSoftware\WykopSDK\Links\Response\Comments as CommentsResponse;
use XzSoftware\WykopSDK\Links\Response\CommentVotes;
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

    public function vote(Vote $commentVote): CommentVotes
    {
        return $commentVote
            ->getResponseBuilder()
            ->build($this->client->handle($commentVote));
    }

    public function add(Add $add): Comment
    {
        $data = $this->client->handle($add);
        return $add
            ->getResponseBuilder()
            ->build($data);
    }

    public function edit(Edit $edit): Comment
    {
        return $edit
            ->getResponseBuilder()
            ->build($this->client->handle($edit));
    }

    public function get(Get $comment): Comment
    {
        return $comment
            ->getResponseBuilder()
            ->build($this->client->handle($comment));
    }

}