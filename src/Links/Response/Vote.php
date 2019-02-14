<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 21:07
 */

namespace XzSoftware\WykopSDK\Links\Response;

use XzSoftware\WykopSDK\ResponseObjects\User;

class Vote
{
    /** @var User */
    private $author;
    /** @var \DateTime */
    private $date;

    public function __construct(User $author, \DateTime $date)
    {
        $this->author = $author;
        $this->date = $date;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

}