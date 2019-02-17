<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 20:57
 */

namespace XzSoftware\WykopSDK\Suggest\Builder;

use XzSoftware\WykopSDK\Suggest\Response\Tags;
use XzSoftware\WykopSDK\Suggest\TagSuggestion;

class TagsBuilder
{
    public function build(array $data): Tags
    {
        $tags = [];
        foreach ($data['data'] as $tag)
        {
            $tags[] = new TagSuggestion($tag['tag'], $tag['followers']);
        }

        return new Tags($tags);
    }
}