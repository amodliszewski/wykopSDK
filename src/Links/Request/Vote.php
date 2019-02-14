<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:26
 */

namespace XzSoftware\WykopSDK\Links\Request;

use XzSoftware\WykopSDK\Links\Builder\VotesBuilder;
use XzSoftware\WykopSDK\RequestObjects\GetObject;

abstract class Vote extends GetObject
{
    protected $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getResponseBuilder(): VotesBuilder
    {
        return new VotesBuilder();
    }
}