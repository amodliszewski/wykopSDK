<?php
declare(strict_types=1);

/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 18:08
 */

namespace XzSoftware\WykopSDK\Entries\Request;

class EditComment extends AddComment
{
    public function getPrefix(): string
    {
        return 'Entries/CommentEdit/' . $this->id . '/';
    }
}