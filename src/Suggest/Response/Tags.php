<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 20:57
 */

namespace XzSoftware\WykopSDK\Suggest\Response;

use ArrayIterator;
use IteratorAggregate;

class Tags implements IteratorAggregate
{
    /** @var TagSuggestion[] */
    private $tags;

    /**
     * @param TagSuggestion[] $tags
     */
    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return TagSuggestion[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->tags);
    }
}