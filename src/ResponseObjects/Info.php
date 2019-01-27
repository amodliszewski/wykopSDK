<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 16:52
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Info
{
    /** @var string */
    private $body;
    /** @var string */
    private $color;

    public function __construct(string $body, string $color)
    {
        $this->body = $body;
        $this->color = $color;
    }

    public static function buildFromRaw(array $data): Info
    {
        return new Info(
            $data['body'],
            $data['color']
        );
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}
