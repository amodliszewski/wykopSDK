<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 12/02/2019
 * Time: 22:35
 */
namespace XzSoftware\WykopSDK\Entries\Builder;

use XzSoftware\WykopSDK\Entries\Response\Entries;
use XzSoftware\WykopSDK\Entries\Response\Votes;
use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\User;
use XzSoftware\WykopSDK\ResponseObjects\Vote;

class VotesBuilder
{
    public function build(array $data, $key = 'voters'): Votes
    {
        $votes = [];

        foreach($data[$key] as $key => $vote) {

            $votes[] = new Vote(
                User::buildFromRaw($vote['author']),
                (int) $vote['vote_type'],
                new \DateTime($vote['date'])
            );
        }

        return new Votes($votes);
    }
}