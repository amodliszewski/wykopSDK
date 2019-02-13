<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 12/02/2019
 * Time: 22:20
 */

namespace  XzSoftware\WykopSDK\Entries\Request;

class Edit extends Add
{
    private $id;

    public function __construct(int $id, string $body, $embed = null, ?bool $adultMedia = false)
    {
        $this->id = $id;
        parent::__construct($body, $embed, $adultMedia);
    }

    public function getPrefix(): string
    {
        return 'Entries/Edit/' . $this->id .'/' ;
    }
}