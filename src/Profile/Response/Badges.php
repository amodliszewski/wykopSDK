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

namespace XzSoftware\WykopSDK\Profile\Response;

use XzSoftware\WykopSDK\ResponseObjects\Badge;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class Badges
{
    /** @var Badge[] */
    private $badges;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $badges, Pagination $pagination)
    {
        $this->badges = $badges;
        $this->pagination = $pagination;
    }

    public function getBadges(): array
    {
        return $this->badges;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}