<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 21:00
 */

namespace XzSoftware\WykopSDK\Links\Request;

use XzSoftware\WykopSDK\Links\Builder\LinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class Top extends GetObject
{
    private $month;
    private $year;

    /**
     * Top constructor.
     * @param $month
     * @param $year
     */
    public function __construct(int $year, ?int $month = null)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function getPrefix(): string
    {
        $prefix = 'Links/Top/' . $this->year . '/';
        if (!empty($this->month)) {
            $prefix .= $this->month . '/';
        }
        return $prefix;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): LinksBuilder
    {
        return new LinksBuilder();
    }
}