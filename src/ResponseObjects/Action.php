<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 17:05
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Link;

class Action
{
    /** @var string */
    private $type;
    /** @var Link|Entry */
    private $entity;

    /**
     * Action constructor.
     * @param string $type
     * @param Entry|Link $entity
     */
    public function __construct(string $type, $entity)
    {
        $this->type = $type;
        $this->entity = $entity;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return Entry|Link
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
