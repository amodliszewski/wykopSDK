<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 18:33
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\RequestObjects\GetObject;

class VoteSurvey extends GetObject
{
    /** @var int */
    private $entryId;
    /** @var int */
    private $answerId;

    public function __construct(int $entryId, int $answerId)
    {
        $this->entryId = $entryId;
        $this->answerId = $answerId;
    }

    public function getPrefix(): string
    {
        return 'Entries/SurveyVote/' . $this->entryId . '/' . $this->answerId;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {

    }
}