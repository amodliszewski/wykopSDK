<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 15:41
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Notification
{
    /** @var int */
    private $id;
    /** @var User */
    private $author;
    /** @var \DateTime */
    private $date;
    /** @var string */
    private $body;
    /** @var string */
    private $type;
    /** @var int */
    private $itemId;
    /** @var int */
    private $subItemId;
    /** @var string */
    private $url;
    /** @var bool */
    private $read;

    public function __construct(
        int $id,
        User $author,
        \DateTime $date,
        string $body,
        string $type,
        int $itemId,
        int $subItemId,
        string $url,
        bool $read
    ) {
        $this->id = $id;
        $this->author = $author;
        $this->date = $date;
        $this->body = $body;
        $this->type = $type;
        $this->itemId = $itemId;
        $this->subItemId = $subItemId;
        $this->url = $url;
        $this->read = $read;
    }

    public static function buildFromRaw(array $data): self
    {
        return new Notification(
            $data['id'],
            User::buildFromRaw($data['author']),
            new \DateTime($data['date']),
            $data['body'],
            $data['type'],
            $data['item_id'],
            $data['subitem_id'],
            $data['url'],
            !$data['new']
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function getSubItemId(): int
    {
        return $this->subItemId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function isRead(): bool
    {
        return $this->read;
    }
}
