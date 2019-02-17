<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 11:20
 */

namespace XzSoftware\WykopSDK\Links\Response;

use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\Vote;

class CommentVotes
{
    private $digs;
    private $buries;
    private $count;

    public function __construct(int $digs, int $buries)
    {
        $this->digs = $digs;
        $this->buries = $buries;
        $this->count = $buries + $digs;
    }

    public function getDigs(): int
    {
        return $this->digs;
    }

    public function getBuries(): int
    {
        return $this->buries;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}