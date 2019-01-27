<?php
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 17:42
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class UserDetails
{
    /** @var string|null */
    private $email;
    /** @var string|null */
    private $about;
    /** @var string|null */
    private $name;
    /** @var string|null */
    private $www;
    /** @var string|null */
    private $jabber;
    /** @var string|null */
    private $gg;
    /** @var string|null */
    private $city;
    /** @var string|null */
    private $facebook;
    /** @var string|null */
    private $twitter;
    /** @var string|null */
    private $instagram;

    public function __construct(
        ?string $email = null,
        ?string $about = null,
        ?string $name = null,
        ?string $www = null,
        ?string $jabber = null,
        ?string $gg = null,
        ?string $city = null,
        ?string $facebook = null,
        ?string $twitter = null,
        ?string $instagram = null
    ) {
        $this->email = $email;
        $this->about = $about;
        $this->name = $name;
        $this->www = $www;
        $this->jabber = $jabber;
        $this->gg = $gg;
        $this->city = $city;
        $this->facebook = $facebook;
        $this->twitter = $twitter;
        $this->instagram = $instagram;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getWww(): ?string
    {
        return $this->www;
    }

    public function getJabber(): ?string
    {
        return $this->jabber;
    }

    public function getGg(): ?string
    {
        return $this->gg;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }
}
