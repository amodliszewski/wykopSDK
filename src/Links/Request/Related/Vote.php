<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 10:49
 */

namespace XzSoftware\WykopSDK\Links\Request\Related;

use XzSoftware\WykopSDK\Links\Request\Vote as LinkVote;

abstract class Vote extends LinkVote
{
    /** @var int */
    protected $relatedLinkId;

    public function __construct(int $linkId, int $relatedLinkId)
    {
        parent::__construct($linkId);
        $this->relatedLinkId = $relatedLinkId;
    }

    public function isValid(): bool
    {
        return true;
    }
}