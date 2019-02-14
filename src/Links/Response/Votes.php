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

namespace XzSoftware\WykopSDK\Links\Response;

use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\Vote;

class Votes
{
    private $digs;
    private $buries;

    public function __construct(int $digs, int $buries)
    {
        $this->digs = $digs;
        $this->buries = $buries;
    }

    public function getDigs(): int
    {
        return $this->digs;
    }

    public function getBuries(): int
    {
        return $this->buries;
    }
}