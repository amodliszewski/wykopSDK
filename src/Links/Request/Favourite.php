<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 21:00
 */

namespace XzSoftware\WykopSDK\Links\Request;

use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Favourite extends GetObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getPrefix(): string
    {
        return 'Links/Favorite/id/' . $this->id . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): bool
    {
        return false;
    }
}