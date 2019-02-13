<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 12/02/2019
 * Time: 22:33
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Vote
{
    /** @var int */
    private $author;
    /** @var array */
    private $voteType;
    /** @var string */
    private $date;

    public function __construct(User $user, int $voteType, \DateTime $dateTime)
    {
        $this->author = $user;
        $this->voteType = $voteType;
        $this->date = $dateTime;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @return array
     */
    public function getVoteType(): array
    {
        return $this->voteType;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
}
