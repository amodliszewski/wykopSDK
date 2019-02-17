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

class ReadAll extends GetObject
{
    public const READ_ALL = 'ReadAllNotifications';
    public const READ_USER = 'ReadDirectedNotifications';
    public const READ_TAG = 'ReadHashTagsNotifications';
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
        return in_array($this->type, [self::READ_ALL, self::READ_USER, self::READ_TAG]);
    }

    public function getResponseBuilder()
    {
        throw new \Exception('This class does not support builder');
    }
}