<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 09:40
 */

namespace XzSoftware\WykopSDK\Links\Request\Related;

use XzSoftware\WykopSDK\Links\Builder\CommentBuilder;
use XzSoftware\WykopSDK\Links\Builder\RelatedBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Add extends PostObject
{
    /** @var int */
    private $linkId;

    public function __construct(int $linkId, string $url, string $title, bool $plus18 = false)
    {
        $this->linkId = $linkId;
        $this->setUrl($url)
            ->setTitle($title)
            ->setPlus18($plus18);
    }

    public function setUrl(string $url): self
    {
        $this->postParams['url'] = $url;

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->postParams['title'] = $title;

        return $this;
    }


    public function setPlus18(bool $plus18): self
    {
        $this->postParams['plus18'] = $plus18;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Links/RelatedAdd/' . $this->linkId . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): RelatedBuilder
    {
        return new RelatedBuilder();
    }
}