<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 12:48
 */

namespace XzSoftware\WykopSDK\Tags\Response;

class Status
{
    /** @var bool */
    private $observed;
    /** @var bool */
    private $blocked;

    public function __construct(bool $observed, bool $blocked)
    {
        $this->observed = $observed;
        $this->blocked = $blocked;
    }

    public function isObserved(): bool
    {
        return $this->observed;
    }

    public function isBlocked(): bool
    {
        return $this->blocked;
    }
}