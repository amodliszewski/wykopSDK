<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 13/02/2019
 * Time: 17:58
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\Entries\Builder\EntryBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class AddComment extends PostObject
{
    protected $id;

    public function __construct(int $id, string $body, $embed = null)
    {
        $this->id = $id;
        $this->setBody($body);

        if (is_resource($embed)) {
            $this->setEmbedFile($embed);
        } else if (!empty($embed) && is_string($embed)) {
            $this->setEmbedString($embed);
        }
    }

    public function setBody(string $body): self
    {
        $this->postParams['body'] = $body;

        return $this;
    }

    public function setEmbedString(string $embed): self
    {
        $this->postParams['embed'] = $embed;

        return $this;
    }

    public function setEmbedFile(resource $file): self
    {
        $meta_data = stream_get_meta_data($file);
        $path = explode(DIRECTORY_SEPARATOR, $meta_data["uri"]);
        $fileName = array_pop($path);
        $this->files[$fileName] = $file;

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Entries/CommentAdd/' . $this->id . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): EntryBuilder
    {
        return new EntryBuilder();
    }
}