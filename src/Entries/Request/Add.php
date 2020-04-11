<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 28/01/2019
 * Time: 19:09
 */

namespace XzSoftware\WykopSDK\Entries\Request;

use XzSoftware\WykopSDK\Entries\Builder\EntryBuilder;
use XzSoftware\WykopSDK\RequestObjects\PostObject;
use XzSoftware\WykopSDK\RequestObjects\Survey;

class Add extends PostObject
{
    /**
     * Add constructor.
     * @param string $body
     * @param null|string|resource $embed
     * @param null|bool $adultMedia
     * @param null|Survey $survey
     */
    public function __construct(string $body, $embed = null, ?bool $adultMedia = false, ?Survey $survey = null)
    {
        $this->setBody($body);

        if (is_resource($embed)) {
            $this->setEmbedFile($embed);
        } else if (!empty($embed) && is_string($embed)) {
            $this->setEmbedString($embed);
        }

        $this->setAdultMedia($adultMedia);
        if ($survey !== null) {
            $this->setSurvey($survey);
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

    public function setEmbedFile($file)
    {
        $meta_data = stream_get_meta_data($file);
        $path = explode(DIRECTORY_SEPARATOR, $meta_data["uri"]);
        $fileName = array_pop($path);
        $this->files[$fileName] = $file;
    }

    public function setAdultMedia(bool $adultMedia): self
    {
        $this->postParams['adultmedia'] = $adultMedia;

        return $this;
    }

    public function setSurvey(Survey $survey): self
    {
        foreach ($survey->toParam() as $key => $param) {
            $this->postParams[$key] = $param;
        }

        return $this;
    }

    public function getPrefix(): string
    {
        return 'Entries/Add/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder(): EntryBuilder
    {
        new EntryBuilder();
    }
}