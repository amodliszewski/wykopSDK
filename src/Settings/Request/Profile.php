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

class Profile extends PostObject
{
    public function setRealName(string $realname): self
    {
        $this->postParams['realname'] = $realname;
        return $this;
    }

    public function setHomesite(string $homesite): self
    {
        $this->postParams['homesite'] = $homesite;
        return $this;
    }

    public function setCity(string $city): self
    {
        $this->postParams['city'] = $city;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->postParams['email'] = $email;
        return $this;
    }

    public function setSkype(string $skype): self
    {
        $this->postParams['skype'] = $skype;
        return $this;
    }

    public function setAbout(string $about): self
    {
        $this->postParams['about'] = $about;
        return $this;
    }

    public function setFacebook(string $facebook): self
    {
        $this->postParams['facebook'] = $facebook;
        return $this;
    }

    public function setTwitter(string $twitter): self
    {
        $this->postParams['twitter'] = $twitter;
        return $this;
    }

    public function setInstagram(string $instagram): self
    {
        $this->postParams['instagram'] = $instagram;
        return $this;
    }

    public function getPrefix(): string
    {
        return 'Settings/Profile/';
    }

    public function isValid(): bool
    {
        return count($this->postParams) >= 1;
    }

    public function getResponseBuilder()
    {

    }
}