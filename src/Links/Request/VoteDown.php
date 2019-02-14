<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:26
 */

namespace XzSoftware\WykopSDK\Links\Request;

class VoteDown extends Vote
{
    public const VOTE_DUPLICATE = 1;
    public const VOTE_SPAM = 2;
    public const VOTE_FAKE = 3;
    public const VOTE_INAPPROPRIATE_CONTENT = 4;
    public const VOTE_UNSUITABLE = 5;

    private $voteType;

    public function __construct(int $id, int $voteType)
    {
        parent::__construct($id);
        $this->voteType = $voteType;
    }

    public function getPrefix(): string
    {
        return 'Links/VoteDown/' . $this->id . '/' . $this->voteType . '/';
    }

    public function isValid(): bool
    {
        return in_array($this->voteType, [
            self::VOTE_DUPLICATE,
            self::VOTE_SPAM,
            self::VOTE_FAKE,
            self::VOTE_INAPPROPRIATE_CONTENT,
            self::VOTE_UNSUITABLE
        ]);
    }
}