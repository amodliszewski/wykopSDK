<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:40
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Color
{
    /** @var int */
    private $color;
    /** @var array */
    private $rgb;
    /** @var string */
    private $hex;

    public function __construct(int $color, array $rgb, string $hex)
    {
        $this->color = $color;
        $this->rgb = $rgb;
        $this->hex = $hex;
    }

    public function getColor(): int
    {
        return $this->color;
    }

    public function getRgb(): array
    {
        return $this->rgb;
    }

    public function getHex(): string
    {
        return $this->hex;
    }
}
