<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 19:59
 */

namespace XzSoftware\WykopSDK\AddLink\Response;

use XzSoftware\WykopSDK\ResponseObjects\Link;

class Draft
{
    /** @var string */
    private $key;
    /** @var string */
    private $title;
    /** @var string */
    private $sourceUrl;
    /** @var Link[] */
    private $duplicates;

    /**
     * @param Link[] $duplicates
     */
    public function __construct(string $key, string $title, string $sourceUrl, array $duplicates)
    {
        $this->key = $key;
        $this->title = $title;
        $this->sourceUrl = $sourceUrl;
        $this->duplicates = $duplicates;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSourceUrl(): string
    {
        return $this->sourceUrl;
    }

    /**
     * @return Link[]
     */
    public function getDuplicates(): array
    {
        return $this->duplicates;
    }
}