<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 21:30
 */

namespace XzSoftware\WykopSDK\Links\Builder;

use XzSoftware\WykopSDK\Links\Response\Vote;
use XzSoftware\WykopSDK\Links\Response\Voters;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\User;

class VotersBuilder
{
    public function build(array $data): Voters
    {
        $voters = [];
        foreach($data['data'] as $voter) {
            $voters[] = new Vote(User::buildFromRaw($voter['author']), new \DateTime($voter['date']));
        }

        return new Voters(
            $data['item']['vote_count'],
            $data['item']['bury_count'],
            $voters,
            Pagination::buildFromRaw(!empty($data['pagination']) ? $data['pagination'] : [])
        );
    }
}