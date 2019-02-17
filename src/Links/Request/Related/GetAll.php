<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 15/02/2019
 * Time: 21:50
 */

namespace XzSoftware\WykopSDK\Links\Request\Related;

use XzSoftware\WykopSDK\Links\Builder\RelatedLinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class GetAll extends GetObject
{
    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getPrefix(): string
    {
        return 'Links/Related/' . $this->id . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): RelatedLinksBuilder
    {
        return new RelatedLinksBuilder();
    }
}