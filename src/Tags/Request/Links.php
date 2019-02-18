<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:38
 */

namespace XzSoftware\WykopSDK\Tags\Request;

use XzSoftware\WykopSDK\Builders\LinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Links extends GetObject
{
    /** @var string */
    private $tag;

    public function __construct(string $tag, int $page = null)
    {
        $this->tag = $tag;
        if (!empty($page)) {
            $this->setPage($page);
        }
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;
        return $this;
    }

    public function getPrefix(): string
    {
        return 'Tags/Links/' . $this->tag . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): LinksBuilder
    {
        return new LinksBuilder();
    }
}