<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 15/02/2019
 * Time: 21:23
 */

namespace XzSoftware\WykopSDK\Links\Request\Comment;

use XzSoftware\WykopSDK\Links\Builder\CommentBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Add extends PostObject
{
    /** @var int */
    private $linkId;
    /** @var int */
    private $commentId;

    /**
     * CommentAdd constructor.
     * @param int $linkId
     * @param string $body
     * @param string|resource|null $embed
     */
    public function __construct(int $linkId, string $body, ?int $commentId = null, $embed = null)
    {
        $this->linkId = $linkId;
        $this->commentId = $commentId;
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

    public function setEmbedFile(resource $file)
    {
        $meta_data = stream_get_meta_data($file);
        $path = explode(DIRECTORY_SEPARATOR, $meta_data["uri"]);
        $fileName = array_pop($path);
        $this->files[$fileName] = $file;
    }


    public function getPrefix(): string
    {
        if (!empty($this->commentId)) {
            return 'Links/CommentAdd/' . $this->linkId . '/' . $this->commentId . '/';
        }

        return 'Links/CommentAdd/' . $this->linkId . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): CommentBuilder
    {
        return new CommentBuilder();
    }
}