<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 18:46
 */

namespace XzSoftware\WykopSDK\Links\Response;

use XzSoftware\WykopSDK\ResponseObjects\Comment;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class Comments
{
    /** @var Comment[] */
    private $comments;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $comments, Pagination $pagination)
    {
        $this->comments = $comments;
        $this->pagination = $pagination;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}