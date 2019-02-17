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
use XzSoftware\WykopSDK\Tags\Builder\StatusBuilder;

abstract class Status extends GetObject
{
    /** @var string */
    protected $tag;

    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): StatusBuilder
    {
        return new StatusBuilder();
    }
}