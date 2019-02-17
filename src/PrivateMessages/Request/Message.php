<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 17:09
 */

namespace XzSoftware\WykopSDK\PrivateMessages\Request;

use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Message extends PostObject
{
    /** @var string */
    private $receiver;

    /**
     * Message constructor.
     * @param string $receiver
     * @param string $body
     * @param string|resource $embed
     */
    public function __construct(string $receiver, string $body, $embed = null)
    {
        $this->receiver = $receiver;
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
        return 'Pm/SendMessage/' . $this->receiver . '/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {
        // TODO: Implement getResponseBuilder() method.
    }
}