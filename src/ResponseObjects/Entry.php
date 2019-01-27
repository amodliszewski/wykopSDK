<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 13:47
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Entry
{
    /** @var int */
    private $id;
    /** @var \DateTime */
    private $createdAt;
    /** @var string */
    private $body;
    /** @var User */
    private $author;
    /** @var ?User */
    private $receiver;
    /** @var bool */
    private $blocked;
    /** @var bool */
    private $favourite;
    /** @var int */
    private $voteCount;
    /** @var int */
    private $commentsCount;
    /** @var Comment|null */
    private $comment;
    /** @var Survey|null */
    private $survey;
    /** @var Embed|null */
    private $embed;
    /** @var string */
    private $status;
    /** @var bool */
    private $canComment;
    /** @var int 0 / 1 */
    private $userVote;
    /** @var string|null */
    private $app;
    /** @var string|null */
    private $violationUrl;

    public static function buildFromRaw(array $data): Entry
    {
        return new Entry(
            $data['id'],
            new \DateTime($data['date']),
            $data['body'],
            User::buildFromRaw($data['author']),
            !empty($data['author']) ? User::buildFromRaw($data['author']) : null,
            $data['is_blocked'],
            $data['is_favourite'],
            $data['vote_count'],
            $data['comments_count'],
            !empty($data['comment']) ? Comment::buildFromRaw($data['comment']) : null,
            !empty($data['survey']) ? Survey::buildFromRaw($data['survey']) : null,
            !empty($data['embed']) ? Embed::buildFromRaw($data['embed']) : null,
            $data['status'],
            $data['can_comment'],
            $data['user_vote'],
            $data['app'],
            $data['violation_url']
        );
    }

    public function __construct(
        int $id,
        \DateTime $createdAt,
        string $body,
        User $author,
        ?User $receiver,
        ?bool $blocked,
        ?bool $favourite,
        ?int $voteCount,
        ?int $commentsCount,
        ?Comment $comment,
        ?Survey $survey,
        ?Embed $embed,
        ?string $status,
        ?bool $canComment,
        ?int $userVote,
        ?string $app,
        ?string $violationUrl
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->body = $body;
        $this->author = $author;
        $this->receiver = $receiver;
        $this->blocked = $blocked;
        $this->favourite = $favourite;
        $this->voteCount = $voteCount;
        $this->commentsCount = $commentsCount;
        $this->comment = $comment;
        $this->survey = $survey;
        $this->embed = $embed;
        $this->status = $status;
        $this->canComment = $canComment;
        $this->userVote = $userVote;
        $this->app = $app;
        $this->violationUrl = $violationUrl;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function isBlocked(): ?bool
    {
        return $this->blocked;
    }

    public function isFavourite(): ?bool
    {
        return $this->favourite;
    }

    public function getVoteCount(): ?int
    {
        return $this->voteCount;
    }

    public function getCommentsCount(): ?int
    {
        return $this->commentsCount;
    }

    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    public function getSurvey(): ?Survey
    {
        return $this->survey;
    }

    public function getEmbed(): ?Embed
    {
        return $this->embed;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function isCanComment(): ?bool
    {
        return $this->canComment;
    }

    public function getUserVote(): ?int
    {
        return $this->userVote;
    }

    public function getApp(): ?string
    {
        return $this->app;
    }

    public function getViolationUrl(): ?string
    {
        return $this->violationUrl;
    }
}
