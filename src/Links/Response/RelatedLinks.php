<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 15/02/2019
 * Time: 22:02
 */

namespace XzSoftware\WykopSDK\Links\Response;

use XzSoftware\WykopSDK\ResponseObjects\RelatedLink;

class RelatedLinks
{
    /** @var RelatedLink[] */
    private $links;

    /**
     * RelatedLinks constructor.
     * @param RelatedLink[] $links
     */
    public function __construct(array $links)
    {
        $this->links = $links;
    }

    /**
     * @return RelatedLink[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }
}