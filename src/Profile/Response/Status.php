<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:28
 */

namespace XzSoftware\WykopSDK\Profile\Response;

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