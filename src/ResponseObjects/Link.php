<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 16:43
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Link
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $description;
    /** @var string */
    private $tags;
    /** @var string */
    private $sourceUrl;
    /** @var int */
    private $voteCount;
    /** @var int */
    private $buryCount;
    /** @var int */
    private $relatedCount;
    /** @var \DateTime */
    private $createdAt;
    /** @var User */
    private $author;
    /** @var string */
    private $preview;
    /** @var bool */
    private $plus18;
    /** @var string */
    private $status;
    /** @var boolean */
    private $canVote;
    /** @var bool */
    private $hot;
    /** @var Comment[] */
    private $comments;
    /** @var string */
    private $userVote;
    /** @var bool */
    private $userFavourite;
    /** @var bool */
    private $userObserve;
    /** @var array */
    private $userLists;
    /** @var bool */
    private $recommended;
    /** @var string|null */
    private $app;
    /** @var bool|null */
    private $hasOwnContent;
    /** @var Info|null */
    private $info;
    /** @var string|null */
    private $url;
    /** @var string|null */
    private $violationUrl;

    public static function buildFromRaw(array $data): Link
    {
        $comments = [];

        foreach ($data['comments'] as $comment) {
            $comments[] = Comment::buildFromRaw($comment);
        }

        return new Link(
            $data['id'],
            $data['title'],
            $data['description'],
            $data['tags'],
            $data['source_url'],
            $data['vote_count'],
            $data['bury_count'],
            $data['related_count'],
            new \DateTime($data['date']),
            User::buildFromRaw($data['author']),
            $data['preview'],
            $data['plus18'],
            $data['status'],
            $data['can_vote'],
            $data['is_hot'],
            $comments,
            $data['user_vote'],
            $data['user_favourite'],
            $data['user_observe'],
            $data['user_lists'],
            $data['is_recommended'],
            $data['app'],
            $data['has_own_content'],
            !empty($data['info']) ? Info::buildFromRaw($data['info']) : null,
            $data['url'],
            $data['violation_url']
        );
    }

    public function __construct(
        int $id,
        string $title,
        string $description,
        string $tags,
        string $sourceUrl,
        int $voteCount,
        int $buryCount,
        int $relatedCount,
        \DateTime $createdAt,
        User $author,
        string $preview,
        bool $plus18,
        string $status,
        bool $canVote,
        bool $hot,
        array $comments,
        ?string $userVote,
        ?bool $userFavourite,
        ?bool $userObserve,
        ?array $userLists,
        ?bool $recommended,
        ?string $app,
        ?bool $hasOwnContent = null,
        ?Info $info = null,
        ?string $url = null,
        ?string $violationUrl = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
        $this->sourceUrl = $sourceUrl;
        $this->voteCount = $voteCount;
        $this->buryCount = $buryCount;
        $this->relatedCount = $relatedCount;
        $this->createdAt = $createdAt;
        $this->author = $author;
        $this->preview = $preview;
        $this->plus18 = $plus18;
        $this->status = $status;
        $this->canVote = $canVote;
        $this->hot = $hot;
        $this->comments = $comments;
        $this->userVote = $userVote;
        $this->userFavourite = $userFavourite;
        $this->userObserve = $userObserve;
        $this->userLists = $userLists;
        $this->recommended = $recommended;
        $this->app = $app;
        $this->hasOwnContent = $hasOwnContent;
        $this->info = $info;
        $this->url = $url;
        $this->violationUrl = $violationUrl;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTags(): string
    {
        return $this->tags;
    }

    public function getSourceUrl(): string
    {
        return $this->sourceUrl;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function getBuryCount(): int
    {
        return $this->buryCount;
    }

    public function getRelatedCount(): int
    {
        return $this->relatedCount;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getPreview(): string
    {
        return $this->preview;
    }

    public function isPlus18(): bool
    {
        return $this->plus18;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function isCanVote(): bool
    {
        return $this->canVote;
    }

    public function isHot(): bool
    {
        return $this->hot;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function getUserVote(): ?string
    {
        return $this->userVote;
    }

    public function isUserFavourite(): ?bool
    {
        return $this->userFavourite;
    }

    public function isUserObserve(): ?bool
    {
        return $this->userObserve;
    }

    public function getUserLists(): ?array
    {
        return $this->userLists;
    }

    public function isRecommended(): ?bool
    {
        return $this->recommended;
    }

    public function getApp(): ?string
    {
        return $this->app;
    }

    public function getHasOwnContent(): ?bool
    {
        return $this->hasOwnContent;
    }

    public function getInfo(): ?Info
    {
        return $this->info;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getViolationUrl(): ?string
    {
        return $this->violationUrl;
    }
}
