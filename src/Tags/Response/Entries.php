<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:44
 */

namespace XzSoftware\WykopSDK\Tags\Response;

use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class Entries
{
    /** @var Entry[] */
    private $entries;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $entries, Pagination $pagination)
    {
        $this->entries = $entries;
        $this->pagination = $pagination;
    }

    public function getEntries(): array
    {
        return $this->entries;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}