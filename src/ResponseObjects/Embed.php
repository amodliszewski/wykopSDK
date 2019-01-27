<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 14:00
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Embed
{
    /** @var string */
    private $type;
    /** @var string */
    private $url;
    /** @var string */
    private $source;
    /** @var string */
    private $preview;
    /** @var bool */
    private $plus18;
    /** @var string */
    private $size;
    /** @var boolean */
    private $animated;
    /** @var float */
    private $ratio;

    public function __construct(
        string $type,
        string $url,
        ?string $source,
        string $preview,
        bool $plus18,
        ?string $size,
        ?bool $animated,
        ?float $ratio
    ) {
        $this->type = $type;
        $this->url = $url;
        $this->source = $source;
        $this->preview = $preview;
        $this->plus18 = $plus18;
        $this->size = $size;
        $this->animated = $animated;
        $this->ratio = $ratio;
    }

    public static function buildFromRaw(array $data): Embed
    {
        return new Embed(
            $data['type'],
            $data['url'],
            $data['source'],
            $data['preview'],
            $data['plus18'],
            $data['size'],
            $data['animated'],
            $data['ratio']
        );
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function getPreview(): string
    {
        return $this->preview;
    }

    public function isPlus18(): bool
    {
        return $this->plus18;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function isAnimated(): ?bool
    {
        return $this->animated;
    }

    public function getRatio(): ?float
    {
        return $this->ratio;
    }

}
