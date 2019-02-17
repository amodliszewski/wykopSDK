<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 17/02/2019
 * Time: 20:30
 */

namespace XzSoftware\WykopSDK\Settings\Request;

use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Background extends PostObject
{
    public function __construct(resource $background)
    {
        $this->setBackground($background);
    }

    public function setBackground(resource $file)
    {
        $meta_data = stream_get_meta_data($file);
        $path = explode(DIRECTORY_SEPARATOR, $meta_data["uri"]);
        $fileName = array_pop($path);
        $this->files[$fileName] = $file;
    }

    public function getPrefix(): string
    {
        return 'Settings/Background/';
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getResponseBuilder()
    {

    }
}