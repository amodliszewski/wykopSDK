<?php
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 17:42
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class UserCounts
{
    /** @var int|null */
    private $addedLinks;
    /** @var int|null */
    private $publishedLinks;
    /** @var int|null */
    private $comments;
    /** @var int|null */
    private $rank;
    /** @var int|null */
    private $followers;
    /** @var int|null */
    private $following;
    /** @var int|null */
    private $entries;
    /** @var int|null */
    private $entriesComments;
    /** @var int|null */
    private $diggs;
    /** @var int|null */
    private $buries;

    public function __construct(
        ?int $addedLinks = null,
        ?int $publishedLinks = null,
        ?int $comments = null,
        ?int $rank = null,
        ?int $followers = null,
        ?int $following = null,
        ?int $entries = null,
        ?int $entriesComments = null,
        ?int $diggs = null,
        ?int $buries = null
    ) {
        $this->addedLinks = $addedLinks;
        $this->publishedLinks = $publishedLinks;
        $this->comments = $comments;
        $this->rank = $rank;
        $this->followers = $followers;
        $this->following = $following;
        $this->entries = $entries;
        $this->entriesComments = $entriesComments;
        $this->diggs = $diggs;
        $this->buries = $buries;
    }

    public function getAddedLinks(): ?int
    {
        return $this->addedLinks;
    }

    public function getPublishedLinks(): ?int
    {
        return $this->publishedLinks;
    }

    public function getComments(): ?int
    {
        return $this->comments;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function getFollowers(): ?int
    {
        return $this->followers;
    }

    public function getFollowing(): ?int
    {
        return $this->following;
    }

    public function getEntries(): ?int
    {
        return $this->entries;
    }

    public function getEntriesComments(): ?int
    {
        return $this->entriesComments;
    }

    public function getDiggs(): ?int
    {
        return $this->diggs;
    }

    public function getBuries(): ?int
    {
        return $this->buries;
    }
}