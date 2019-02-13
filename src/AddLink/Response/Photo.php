<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 19:35
 */

namespace XzSoftware\WykopSDK\AddLink\Response;

class Photo
{
    /** @var string */
    private $key;
    /** @var string */
    private $sourceUrl;

    public function __construct(string $key, string $sourceUrl)
    {
        $this->key = $key;
        $this->sourceUrl = $sourceUrl;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getSourceUrl(): string
    {
        return $this->sourceUrl;
    }
}
