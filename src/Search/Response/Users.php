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

namespace XzSoftware\WykopSDK\Search\Response;

use XzSoftware\WykopSDK\ResponseObjects\Pagination;
use XzSoftware\WykopSDK\ResponseObjects\User;

class Users
{
    /** @var User[] */
    private $users;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $users, Pagination $pagination)
    {
        $this->users = $users;
        $this->pagination = $pagination;
    }

    /**
     * @return User[]
     */
    public function getFollowers(): array
    {
        return $this->users;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}