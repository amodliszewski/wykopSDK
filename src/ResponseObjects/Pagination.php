<?php
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 13:30
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Pagination
{
    /** @var int|null */
    private $next;
    /** @var int|null */
    private $previous;

    public static function buildFromRaw(array $data): Pagination
    {
        preg_match('#page/(\d+)#', !empty($data['previous']) ? $data['previous'] : '', $prev);
        preg_match('#page/(\d+)#', !empty($data['next']) ? $data['next'] : '', $next);

        if (!array_key_exists(1, $next)) {
            $next[1] = 1;
        }

        if (!array_key_exists(1, $prev)) {
            $prev[1] = 1;
        }

        return new Pagination($next[1], $prev[1]);
    }

    public function __construct(?int $next, ?int $previous)
    {
        $this->next = $next;
        $this->previous = $previous;
    }

    public function getNext(): ?int
    {
        return $this->next;
    }

    public function getPrevious(): ?int
    {
        return $this->previous;
    }
}