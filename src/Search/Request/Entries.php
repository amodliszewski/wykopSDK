<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 18:07
 */

namespace XzSoftware\WykopSDK\Search\Request;

use XzSoftware\WykopSDK\RequestObjects\PostObject;
use XzSoftware\WykopSDK\Search\Builder\EntriesBuilder;

class Entries extends PostObject
{
    public const TIMESPAN_ALL = 'all';
    public const TIMESPAN_TODAY = 'today';
    public const TIMESPAN_YESTERDAY = 'yesterday';
    public const TIMESPAN_WEEK = 'week';
    public const TIMESPAN_MONTH = 'month';
    public const TIMESPAN_RANGE = 'range';

    public function __construct(
        string $query,
        ?string $timespan = null,
        ?int $votes = null,
        ?\DateTime $from = null,
        ?\DateTime $to = null,
        ?int $page = null
    ) {
        $this->setQuery($query);

        if (!empty($page)) {
            $this->setPage($page);
        }
        if (!empty($timespan)) {
            $this->setTimespan($timespan);
        }
        if (!empty($votes)) {
            $this->setVotes($votes);
        }
        if (!empty($from)) {
            $this->setFrom($from);
        }
        if (!empty($to)) {
            $this->setTo($to);
        }
    }

    public function setQuery(string $query): self
    {
        $this->postParams['q'] = $query;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->postParams['what'] = $type;
        return $this;
    }

    public function setOrder(string $order): self
    {
        $this->postParams['sort'] = $order;
        return $this;
    }

    public function setTimespan(string $timespan): self
    {
        $this->postParams['when'] = $timespan;
        return $this;
    }

    public function setVotes(int $votes): self
    {
        $this->postParams['votes'] = $votes;
        return $this;
    }

    public function setFrom(\DateTime $from): self
    {
        $this->postParams['from'] = $from->format('Y-m-d');
        return $this;
    }

    public function setTo(\DateTime $to): self
    {
        $this->postParams['to'] = $to->format('Y-m-d');
        return $this;
    }

    public function setPage(int $page): self
    {
        $this->urlParams['page'] = $page;
        return $this;
    }

    public function getPrefix(): string
    {
        return 'Search/Entries/';
    }

    public function isValid(): bool
    {
        $queryValid = strlen($this->postParams['q']) > 3;
        $timespanValid = true;

        if (!empty($this->postParams['when']))
            $timespanValid = in_array(
                $this->postParams['when'],
                [
                    self::TIMESPAN_ALL,
                    self::TIMESPAN_MONTH,
                    self::TIMESPAN_RANGE,
                    self::TIMESPAN_TODAY,
                    self::TIMESPAN_WEEK,
                    self::TIMESPAN_YESTERDAY
                ]
            );

        $rangeValid = true;
        if (!empty($this->postParams['when']) && $this->postParams['when'] === self::TIMESPAN_RANGE) {
            $rangeValid = $this->postParams['from']->getTimestamp() < $this->postParams['to']->getTimestamp();
        }

        return $queryValid && $timespanValid && $rangeValid;
    }

    public function getResponseBuilder(): EntriesBuilder
    {
        return new EntriesBuilder();
    }
}