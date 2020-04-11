<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 17:30
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

use DateTime;

class User
{
    /** @var string */
    private $login;
    /** @var int */
    private $color;
    /** @var string|null */
    private $sex;
    /** @var string */
    private $avatar;
    /** @var DateTime|null */
    private $signupAt;
    /** @var string|null */
    private $background;
    /** @var bool|null */
    private $isVerified;
    /** @var bool|null */
    private $isObserved;
    /** @var bool|null */
    private $isBlocked;
    /** @var string|null */
    private $violationUrl;
    /** @var UserDetails */
    private $userDetails;
    /** @var UserCounts */
    private $userCounts;

    public function __construct(
        string $login,
        int $color,
        ?string $sex,
        string $avatar,
        UserDetails $details,
        UserCounts $counts,
        ?DateTime $signupAt = null,
        ?string $background = null,
        ?bool $isVerified = null,
        ?bool $isObserved = null,
        ?bool $isBlocked = null,
        ?string $violationUrl = null
    ) {
        $this->login = $login;
        $this->color = $color;
        $this->sex = $sex;
        $this->avatar = $avatar;
        $this->signupAt = $signupAt;
        $this->background = $background;
        $this->isVerified = $isVerified;
        $this->isObserved = $isObserved;
        $this->isBlocked = $isBlocked;
        $this->violationUrl = $violationUrl;
        $this->userDetails = $details;
        $this->userCounts = $counts;
    }

    public static function buildFromRaw(array $data): self
    {
        return new User(
            $data['login'],
            $data['color'],
            $data['sex'],
            $data['avatar'],
            new UserDetails(
                isset($data['email']) ? $data['email'] : null,
                isset($data['about']) ? $data['about'] : null,
                isset($data['name']) ? $data['name'] : null,
                isset($data['www']) ? $data['www'] : null,
                isset($data['jabber']) ? $data['jabber'] : null,
                isset($data['gg']) ? $data['gg'] : null,
                isset($data['city']) ? $data['city'] : null,
                isset($data['facebook']) ? $data['facebook'] : null,
                isset($data['twitter']) ? $data['twitter'] : null,
                isset($data['instagram']) ? $data['instagram'] : null
            ),
            new UserCounts(
                isset($data['links_added_count']) ? $data['links_added_count'] : null,
                isset($data['links_published_count']) ? $data['links_published_count'] : null,
                isset($data['comments_count']) ? $data['comments_count'] : null,
                isset($data['rank']) ? $data['rank'] : null,
                isset($data['followers']) ? $data['followers'] : null,
                isset($data['following']) ? $data['following'] : null,
                isset($data['entries']) ? $data['entries'] : null,
                isset($data['entriesComments']) ? $data['entriesComments'] : null,
                isset($data['diggs']) ? $data['diggs'] : null,
                isset($data['buries']) ? $data['buries'] : null
            ),
            !empty($data['signup_at']) ? new DateTime($data['signup_at']) : null,
            isset($data['background']) ? $data['background'] : null,
            isset($data['is_verified']) ? $data['is_verified'] : null,
            isset($data['is_observed']) ? $data['is_observed'] : null,
            isset($data['is_blocked']) ? $data['is_blocked'] : null,
            isset($data['violation_url']) ? $data['violation_url'] : null
        );
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getColor(): int
    {
        return $this->color;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function getSignupAt(): ?DateTime
    {
        return $this->signupAt;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function isVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function isObserved(): ?bool
    {
        return $this->isObserved;
    }

    public function isBlocked(): ?bool
    {
        return $this->isBlocked;
    }

    public function getViolationUrl(): ?string
    {
        return $this->violationUrl;
    }

    public function getUserDetails(): UserDetails
    {
        return $this->userDetails;
    }

    public function getUserCounts() : UserCounts
    {
        return $this->userCounts;
    }
}