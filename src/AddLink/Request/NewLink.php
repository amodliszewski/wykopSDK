<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 20:20
 */

namespace XzSoftware\WykopSDK\AddLink\Request;

use XzSoftware\WykopSDK\RequestObjects\PostObject;
use XzSoftware\WykopSDK\ResponseObjects\Link;

class NewLink extends PostObject
{
    public function __construct(
        string $draftKey,
        string $title,
        string $description,
        string $tags,
        string $url,
        ?bool $plus18 = null
    ) {
        $this->setDraftKey($draftKey)
            ->setTitle($title)
            ->setDescription($description)
            ->setTags($tags)
            ->setUrl($url);

        if ($plus18 !== null) {
            $this->setPlus18($plus18);
        }
    }

    public function setDraftKey(string $key): self
    {
        $this->urlParams['key'] = $key;
        return $this;
    }

    public function setTitle(string $title):self
    {
        $this->postParams['title'] = $title;
        return $this;
    }

    public function setDescription(string $description):self
    {
        $this->postParams['description'] = $description;
        return $this;
    }

    public function setPhotoKey(string $key):self
    {
        $this->postParams['photo'] = $$key;
        return $this;
    }

    public function setTags(string $tags):self
    {
        $this->postParams['tags'] = $tags;
        return $this;
    }

    public function setUrl(string $url):self
    {
        $this->postParams['url'] = $url;
        return $this;
    }

    public function setPlus18(bool $plus18):self
    {
        $this->postParams['plus18'] = $plus18;
        return $this;
    }

    public function getPrefix(): string
    {
        return 'AddLink/Add/';
    }

    public function isValid(): bool
    {
        return
            $this->postParams['url'] === filter_var($this->postParams['url'], FILTER_VALIDATE_URL) &&
            !empty($this->postParams['title']) &&
            !empty($this->postParams['description']) &&
            !empty($this->postParams['tags']) &&
            !empty($this->urlParams['key']);
    }

    public function getResponseBuilder()
    {
        return new class {
            public function build(array $data): Link
            {
                return Link::buildFromRaw($data['data']);
            }
        };
    }
}