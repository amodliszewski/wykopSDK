<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 21:54
 */

namespace XzSoftware\WykopSDK\Profile\Response;

use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\RelatedLink;

class Related
{
    /** @var RelatedLink[] */
    private $links;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $links, Pagination $pagination)
    {
        $this->links = $links;
        $this->pagination = $pagination;
    }

    /**
     * @return RelatedLink[]
     */
    public function getRelatedLinks(): array
    {
        return $this->links;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}