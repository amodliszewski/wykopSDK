<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 19:15
 */

namespace XzSoftware\WykopSDK\AddLink\Response;

class Duplicate
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $description;
    /** @var string */
    private $tags;
    /** @var string */
    private $sourceUrl;
    /** @var Photo[] */
    private $photos;

    public function __construct(
        int $id,
        string $title,
        string $description,
        string $tags,
        string $sourceUrl,
        array $photos
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
        $this->sourceUrl = $sourceUrl;
        $this->photos = $photos;
    }

    public static function buildFromRaw(array $data): self
    {
        $photos = [];
        foreach ($data['photos'] as $photo) {
            $photos[] = new Photo($photo['key'], $photo['type'], $photo['preview_url'], $photo['source_url']);
        }

        return new Duplicate(
            $data['id'],
            $data['title'],
            $data['description'],
            $data['tags'],
            $data['source_url'],
            $photos
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTags(): string
    {
        return $this->tags;
    }

    public function getSourceUrl(): string
    {
        return $this->sourceUrl;
    }

    /**
     * @return Photo[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

}