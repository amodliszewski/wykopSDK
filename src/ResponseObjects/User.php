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
                $data['email'],
                $data['about'],
                $data['name'],
                $data['www'],
                $data['jabber'],
                $data['gg'],
                $data['city'],
                $data['facebook'],
                $data['twitter'],
                $data['instagram']
            ),
            new UserCounts(
                $data['links_added_count'],
                $data['links_published_count'],
                $data['comments_count'],
                $data['rank'],
                $data['followers'],
                $data['following'],
                $data['entries'],
                $data['entriesComments'],
                $data['diggs'],
                $data['buries']
            ),
            !empty($data['signup_at']) ? new DateTime($data['signup_at']) : null,
            $data['background'],
            $data['is_verified'],
            $data['is_observed'],
            $data['is_blocked'],
            $data['violation_url']
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