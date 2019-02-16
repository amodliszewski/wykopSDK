<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 18:47
 */

namespace XzSoftware\WykopSDK\Links\Builder;

use XzSoftware\WykopSDK\Links\Response\Comments;
use XzSoftware\WykopSDK\ResponseObjects\Comment;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class CommentsBuilder
{
    public function build(array $data): Comments
    {
        $actions = [];
        foreach($data['data'] as $link) {
            $actions[] = Comment::buildFromRaw($link);
        }

        return new Comments(
            $actions,
            Pagination::buildFromRaw(!empty($data['pagination']) ? $data['pagination'] : [])
        );
    }
}