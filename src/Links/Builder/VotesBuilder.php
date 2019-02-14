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
namespace XzSoftware\WykopSDK\Links\Builder;

use XzSoftware\WykopSDK\Links\Response\Votes;

class VotesBuilder
{
    public function build(array $data): Votes
    {
        return new Votes($data['data']['digs'], $data['data']['buries']);
    }
}