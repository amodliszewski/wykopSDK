<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 11:17
 */

namespace XzSoftware\WykopSDK\Links\Builder;

use XzSoftware\WykopSDK\Links\Response\CommentVotes;

class CommentVoteBuilder
{
    public function build($data)
    {
        $buries = $data['data']['vote_count'] - $data['data']['vote_count_plus'];

        return new CommentVotes($data['data']['vote_count_plus'], $buries);
    }
}