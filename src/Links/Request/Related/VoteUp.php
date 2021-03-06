<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 10:51
 */

namespace XzSoftware\WykopSDK\Links\Request\Related;

class VoteUp extends Vote
{
    public function getPrefix(): string
    {
        return 'Links/RelatedVoteUp/' . $this->id . '/' . $this->relatedLinkId . '/';
    }
}
