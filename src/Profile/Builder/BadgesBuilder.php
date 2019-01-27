<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:12
 */

namespace XzSoftware\WykopSDK\Profile\Builder;

use XzSoftware\WykopSDK\Profile\Response\Badges;
use XzSoftware\WykopSDK\ResponseObjects\Badge;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class BadgesBuilder
{
    public function build(array $data): Badges
    {
        $badges = [];
        foreach($data['data'] as $link) {
            $badges[] = Badge::buildFromRaw($link);
        }

        return new Badges(
            $badges,
            Pagination::buildFromRaw(
                !empty($data['pagination']) ? $data['pagination'] : []
            )
        );
    }
}