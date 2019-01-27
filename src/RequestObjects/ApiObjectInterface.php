<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 12:48
 */

namespace XzSoftware\WykopSDK\RequestObjects;

interface ApiObjectInterface
{
    public function getSignerData(): array;

    public function getEndpoint(): string;

    public function setAppKey(string $appkey): void;

    public function setUserKey(string $userKey): void;

    public function isValid(): bool;

    public function getPostParams(): array;

    public function getUrlParams(): array;

    public function getResponseBuilder();
}
