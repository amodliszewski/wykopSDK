<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:30
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Response;

class Message
{
    /** @var int */
    private $id;
    /** @var \DateTime */
    private $date;
    /** @var string */
    private $body;
    /** @var string */
    private $status;
    /** @var string */
    private $direction;

    public function __construct(int $id, \DateTime $date, string $body, string $status, string $direction)
    {
        $this->id = $id;
        $this->date = $date;
        $this->body = $body;
        $this->status = $status;
        $this->direction = $direction;
    }

    public static function buildFromRaw(array $data): self
    {
        return new Message(
            $data['id'],
            new \DateTime($data['date']),
            $data['body'],
            $data['status'],
            $data['direction']
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}