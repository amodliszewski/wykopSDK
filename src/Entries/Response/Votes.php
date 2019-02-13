<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 28/01/2019
 * Time: 18:55
 */

namespace XzSoftware\WykopSDK\Entries\Response;

use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\Vote;

class Votes
{
    /** @var Vote[] */
    private $votes;

    public function __construct(array $votes)
    {
        $this->votes = $votes;
    }

    public function getVotes(): array
    {
        return $this->votes;
    }

    public function getCount(): int
    {
        return count($this->votes);
    }
}