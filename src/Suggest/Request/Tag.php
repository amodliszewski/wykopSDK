<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 20:49
 */

namespace XzSoftware\WykopSDK\Suggest\Request;

use XzSoftware\WykopSDK\RequestObjects\GetObject;
use XzSoftware\WykopSDK\Suggest\Builder\TagsBuilder;

class Tag extends GetObject
{
    private $tag;

    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }
    public function getPrefix(): string
    {
        return 'Suggest/Tags/' . $this->tag . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): TagsBuilder
    {
        return new TagsBuilder();
    }
}