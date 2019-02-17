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

class TagSuggestion
{
    /** @var string */
    private $tagName;
    /** @var int */
    private $followersCount;

    public function __construct(string $tagName, int $followersCOunt)
    {
        $this->tagName = $tagName;
        $this->followersCount = $followersCOunt;
    }

    public function getTagName(): string
    {
        return $this->tagName;
    }

    public function getFollowersCount(): int
    {
        return $this->followersCount;
    }
}