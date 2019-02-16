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

use XzSoftware\WykopSDK\ResponseObjects\Comment;

class CommentBuilder
{
    public function build(array $data): Comment
    {
        return Comment::buildFromRaw($data['data']);
    }
}