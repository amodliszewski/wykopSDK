<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 22:08
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Badge
{
    /** @var string */
    private $name;
    /** @var string */
    private $level;
    /** @var \DateTime */
    private $assignedAt;
    /** @var string */
    private $icon;
    /** @var string|null */
    private $description;

    public static function buildFromRaw(array $data): Badge
    {
        return new Badge(
            $data['name'],
            $data['level'],
            new \DateTime($data['date']),
            $data['icon'],
            $data['description']
        );
    }

    public function __construct(string $name, string $level, \DateTime $assignedAt, string $icon, ?string $description)
    {
        $this->name = $name;
        $this->level = $level;
        $this->assignedAt = $assignedAt;
        $this->icon = $icon;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLevel(): string
    {
        return $this->level;
    }

    public function getAssignedAt(): \DateTime
    {
        return $this->assignedAt;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
