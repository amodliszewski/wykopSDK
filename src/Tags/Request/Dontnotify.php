<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:50
 */

namespace XzSoftware\WykopSDK\Tags\Request;

use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Dontnotify extends GetObject
{
    /** @var string */
    private $tag;

    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    public function getPrefix(): string
    {
        return 'Tags/Dontnotify/' . $this->tag . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {
        // TODO: Implement getResponseBuilder() method.
    }
}