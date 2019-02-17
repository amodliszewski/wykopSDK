<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 16:15
 */

namespace XzSoftware\WykopSDK\Notifications\Request;

use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Count extends GetObject
{
    public const TOTAL_COUNT = 'TotalCount';
    public const USER_COUNT = 'Count';
    public const TAG_COUNT = 'HashTagsCount';
    /** @var string string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getPrefix(): string
    {
        return 'Notifications/' . $this->type . '/';
    }

    public function isValid(): bool
    {
        return in_array($this->type, [self::TAG_COUNT, self::TOTAL_COUNT, self::USER_COUNT]);
    }

    public function getResponseBuilder()
    {
        throw new \Exception('This class does not support builder');
    }
}