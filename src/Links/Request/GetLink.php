<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:26
 */

namespace XzSoftware\WykopSDK\Links\Request;

use XzSoftware\WykopSDK\Links\Builder\LinkBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class GetLink extends GetObject
{
    private $withComments;
    private $id;

    public function __construct(int $id, bool $withComments = false)
    {
        $this->withComments = $withComments;
        $this->id = $id;
    }

    public function getPrefix(): string
    {
        return 'Links/Link/withcomments/' . $this->withComments . '/' . $this->id . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): LinkBuilder
    {
        return new LinkBuilder();
    }
}