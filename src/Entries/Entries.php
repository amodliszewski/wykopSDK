<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:46
 */

namespace XzSoftware\WykopSDK\Entries;

use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Entries\Request\Active;
use XzSoftware\WykopSDK\Entries\Request\Add;
use XzSoftware\WykopSDK\Entries\Request\Delete;
use XzSoftware\WykopSDK\Entries\Request\Edit;
use XzSoftware\WykopSDK\Entries\Request\EntriesStream;
use XzSoftware\WykopSDK\Entries\Request\Hot;
use XzSoftware\WykopSDK\Entries\Request\Observed;
use XzSoftware\WykopSDK\Entries\Request\ToggleFavourite;
use XzSoftware\WykopSDK\Entries\Request\Upvoters;
use XzSoftware\WykopSDK\Entries\Request\VoteRemove;
use XzSoftware\WykopSDK\Entries\Request\VoteSurvey;
use XzSoftware\WykopSDK\Entries\Request\VoteUp;
use XzSoftware\WykopSDK\Entries\Response\Votes;
use XzSoftware\WykopSDK\ResponseObjects\Entries as EntriesResponse;
use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Survey;

class Entries
{
    private $client;
    private $comments;

    public function __construct(Client &$client)
    {
        $this->client = $client;
        $this->comments = new Comments($client);
    }

    public function comments(): Comments
    {
        return $this->comments;
    }

    public function getStream(EntriesStream $stream): EntriesResponse
    {
        return $stream
            ->getResponseBuilder()
            ->build($this->client->handle($stream));
    }

    public function getActive(Active $active): EntriesResponse
    {
        return $active
            ->getResponseBuilder()
            ->build($this->client->handle($active));
    }

    public function getHot(Hot $hot): EntriesResponse
    {
        return $hot
            ->getResponseBuilder()
            ->build($this->client->handle($hot));
    }

    public function getObserved(Observed $observed): EntriesResponse
    {
        return $observed
            ->getResponseBuilder()
            ->build($this->client->handle($observed));
    }

    public function add(Add $newEntry): Entry
    {
        return $newEntry
            ->getResponseBuilder()
            ->build($this->client->handle($newEntry));
    }

    public function edit(Edit $editEntry): Entry
    {
        return $editEntry
            ->getResponseBuilder()
            ->build($this->client->handle($editEntry));
    }

    public function voteUp(int $id): Votes
    {
        $vote = new VoteUp($id);
        return $vote
            ->getResponseBuilder()
            ->build($this->client->handle($vote));
    }

    public function voteRemove(int $id): Votes
    {
        $vote = new VoteRemove($id);
        return $vote
            ->getResponseBuilder()
            ->build($this->client->handle($vote));
    }

    public function upvoters(int $id): Votes
    {
        $voters = new Upvoters($id);
        return $voters
            ->getResponseBuilder()
            ->build($this->client->handle($voters), 'data');
    }

    public function delete(Delete $delete): Entry
    {
        return $delete
            ->getResponseBuilder()
            ->build($this->client->handle($delete));
    }

    /**
     * Returns updated favourite state of given entry
     */
    public function toggleFavourite(int $id): bool
    {
        $resp = $this->client->handle(new ToggleFavourite($id));

        return $resp['data']['favorite/not'];
    }

    public function voteSurvey(VoteSurvey $vote): Survey
    {
        $resp = $this->client->handle($vote);

        return Survey::buildFromRaw($resp['data']);
    }
}