<?php
declare(strict_types=1);

/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 14:03
 */

namespace XzSoftware\WykopSDK\MyWykop\Request;

use XzSoftware\WykopSDK\MyWykop\Builder\ActionsBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Users extends GetObject
{
    public const TYPE_ENTRIES = 'entries';
    public const TYPE_LINKS = 'links';
    public const TYPE_BOTH = 'entries,links';

    private $type;

    public function __construct(string $type, int $page = null)
    {
        $this->type = $type;
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
        return 'Mywykop/Users/type/' . $this->type . '/';
    }

    public function isValid(): bool
    {
        return in_array($this->type, [self::TYPE_ENTRIES, self::TYPE_LINKS, self::TYPE_BOTH]);
    }

    public function getResponseBuilder(): ActionsBuilder
    {
        return new ActionsBuilder();
    }
}