<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 14:03
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Comment
{
    /** @var int */
    private $id;
    /** @var \DateTime */
    private $createdAt;
    /** @var User */
    private $author;
    /** @var int */
    private $voteCount;
    /** @var int */
    private $voteCountPlus;
    /** @var string */
    private $body;
    /** @var int */
    private $parentId;
    /** @var string */
    private $status;
    /** @var bool */
    private $canVote;
    /** @var int */
    private $userVote;
    /** @var bool */
    private $blocked;
    /** @var bool */
    private $favorite;
    /** @var int commentId ?? */
    private $link;
    /** @var Embed|null */
    private $embed;
    /** @var string|null */
    private $app;
    /** @var string|null */
    private $violationUrl;
    /** @var int|null */
    private $voteCountMinus;
    /** @var string|null */
    private $original;

    public static function buildFromRaw(array $data): Comment
    {
        if (array_key_exists('blocked', $data)) {
            $data['is_blocked'] = $data['blocked'];
        }

        if (array_key_exists('favorite', $data)) {
            $data['is_favourite'] = $data['favorite'];
        }

        if (array_key_exists('link_id', $data)) {
            $data['link'] = (int) $data['link_id'];
        }

        return new Comment(
            $data['id'],
            new \DateTime($data['date']),
            User::buildFromRaw($data['author']),
            $data['vote_count'],
            $data['vote_count_plus'],
            $data['body'],
            $data['parent_id'],
            $data['status'],
            $data['can_vote'],
            $data['user_vote'],
            $data['is_blocked'],
            $data['is_favourite'],
            $data['link'],
            !empty($data['embed']) ? Embed::buildFromRaw($data['embed']) : null,
            $data['app'],
            $data['violation_url'],
            $data['vote_count_minus'],
            $data['original']
        );
    }

    public function __construct(
        int $id,
        \DateTime $createdAt,
        User $author,
        int $voteCount,
        int $voteCountPlus,
        string $body,
        int $parentId,
        string $status,
        bool $canVote,
        int $userVote,
        bool $blocked,
        bool $favorite,
        int $link,
        ?Embed $embed,
        ?string $app,
        ?string $violationUrl,
        ?int $voteCountMinus = null,
        ?string $original = null
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->author = $author;
        $this->voteCount = $voteCount;
        $this->voteCountPlus = $voteCountPlus;
        $this->body = $body;
        $this->parentId = $parentId;
        $this->status = $status;
        $this->canVote = $canVote;
        $this->userVote = $userVote;
        $this->blocked = $blocked;
        $this->favorite = $favorite;
        $this->link = $link;
        $this->embed = $embed;
        $this->app = $app;
        $this->violationUrl = $violationUrl;
        $this->voteCountMinus = $voteCountMinus;
        $this->original = $original;
    }

    public function getOriginal(): ?string
    {
        return $this->original;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function getVoteCountPlus(): int
    {
        return $this->voteCountPlus;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function isCanVote(): bool
    {
        return $this->canVote;
    }

    public function getUserVote(): int
    {
        return $this->userVote;
    }

    public function isBlocked(): bool
    {
        return $this->blocked;
    }

    public function isFavorite(): bool
    {
        return $this->favorite;
    }

    public function getLink(): int
    {
        return $this->link;
    }

    public function getEmbed(): ?Embed
    {
        return $this->embed;
    }

    public function getApp(): ?string
    {
        return $this->app;
    }

    public function getViolationUrl(): ?string
    {
        return $this->violationUrl;
    }

    public function getVoteCountMinus(): ?int
    {
        return $this->voteCountMinus;
    }

}
