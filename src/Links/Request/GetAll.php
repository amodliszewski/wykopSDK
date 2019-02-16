<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 15/02/2019
 * Time: 21:02
 */

namespace XzSoftware\WykopSDK\Links\Request;

use XzSoftware\WykopSDK\Links\Builder\CommentsBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

class GetAll extends GetObject
{
    public const ORDER_OLD = 'old';
    public const ORDER_NEW = 'new';
    public const ORDER_BEST = 'best';

    /** @var int */
    private $linkId;
    /** @var string */
    private $order;

    /**
     * GetAll constructor.
     * @param int $linkId
     * @param string $order
     */
    public function __construct(int $linkId, string $order)
    {
        $this->linkId = $linkId;
        $this->order = $order;
    }

    public function setLinkId(int $linkId): self
    {
        $this->linkId = $linkId;

        return $this;
    }

    public function setOrder(string $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Links/Comments/sort' . $this->order . '/' . $this->linkId . '/';
    }

    public function isValid(): bool
    {
        return in_array(
            $this->order,
            [
                self::ORDER_BEST,
                self::ORDER_NEW,
                self::ORDER_OLD
            ]
        );
    }

    public function getResponseBuilder(): CommentsBuilder
    {
        return new CommentsBuilder();
    }
}