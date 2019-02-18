<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 18:04
 */

namespace XzSoftware\WykopSDK\Search\Request;

use XzSoftware\WykopSDK\Builders\LinksBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Links extends PostObject
{
    public const TYPE_ALL = 'all';
    public const TYPE_PROMOTED = 'promoted';
    public const TYPE_ARCHIVED = 'archived';
    public const TYPE_DUPLICATES= 'duplicates';

    public const ORDER_BEST = 'best';
    public const ORDER_DIGS = 'diggs';
    public const ORDER_COMMENTS = 'comments';
    public const ORDER_NEW = 'new';

    public const TIMESPAN_ALL = 'all';
    public const TIMESPAN_TODAY = 'today';
    public const TIMESPAN_YESTERDAY = 'yesterday';
    public const TIMESPAN_WEEK = 'week';
    public const TIMESPAN_MONTH = 'month';
    public const TIMESPAN_RANGE = 'range';

    public function __construct(
        string $query,
        ?string $type = null,
        ?string $order = null,
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
        if (!empty($type)) {
            $this->setType($type);
        }
        if (!empty($order)) {
            $this->setOrder($order);
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
        return 'Search/Links/';
    }

    public function isValid(): bool
    {
        $queryValid = strlen($this->postParams['q']) > 3;
        $typeValid = $orderValid = $timespanValid = true;

        if (!empty($this->postParams['type'])) {
            $typeValid = in_array(
                $this->postParams['type'],
                [
                    self::TYPE_ALL,
                    self::TYPE_ARCHIVED,
                    self::TYPE_DUPLICATES,
                    self::TYPE_PROMOTED
                ]
            );
        }
        if (!empty($this->postParams['sort'])) {
            $orderValid = in_array(
                $this->postParams['sort'],
                [
                    self::ORDER_NEW,
                    self::ORDER_BEST,
                    self::ORDER_COMMENTS,
                    self::ORDER_DIGS
                ]
            );
        }

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

        return $queryValid && $typeValid && $orderValid && $timespanValid && $rangeValid;
    }

    public function getResponseBuilder(): LinksBuilder
    {
        return new LinksBuilder();
    }
}