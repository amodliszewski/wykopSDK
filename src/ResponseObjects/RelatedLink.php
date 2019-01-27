<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 21:54
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class RelatedLink
{
    /** @var int */
    private $id;
    /** @var string */
    private $url;
    /** @var string|null */
    private $title;
    /** @var int */
    private $voteCount;
    /** @var int|null */
    private $userVote;
    /** @var User */
    private $author;

    public static function buildFromRaw(array $data): RelatedLink
    {
        return new RelatedLink(
            $data['id'],
            $data['url'],
            $data['title'],
            $data['vote_count'],
            $data['user_vote'],
            User::buildFromRaw($data['author'])
        );
    }

    public function __construct(int $id, string $url, ?string $title, int $voteCount, ?int $userVote, User $author)
    {
        $this->id = $id;
        $this->url = $url;
        $this->title = $title;
        $this->voteCount = $voteCount;
        $this->userVote = $userVote;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function getUserVote(): ?int
    {
        return $this->userVote;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }
}
