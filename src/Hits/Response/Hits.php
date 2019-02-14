<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 18:26
 */

namespace XzSoftware\WykopSDK\Hits\Response;

use XzSoftware\WykopSDK\ResponseObjects\Link;

class Hits
{
    /** @var Link[] */
    private $links = [];

    /**
     * @param Link[] $links
     */
    public function __construct(array $links)
    {
        $this->links = $links;
    }

    /**
     * @return Link[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }
}
