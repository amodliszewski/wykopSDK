<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 18:10
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

use ArrayIterator;

class Links implements \IteratorAggregate
{
    /** @var Link[] */
    private $links;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $links, Pagination $pagination)
    {
        $this->links = $links;
        $this->pagination = $pagination;
    }

    public function getLinks(): array
    {
        return $this->links;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->links);
    }
}