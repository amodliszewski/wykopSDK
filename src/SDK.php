<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 13:38
 */

namespace XzSoftware\WykopSDK;

use GuzzleHttp\Client as HttpClient;
use XzSoftware\WykopSDK\Profile\Profiles;
use XzSoftware\WykopSDK\UserManagement\UserManagement;

class SDK
{
    public const API_PREFIX = 'https://a2.wykop.pl/';
    /** @var Client */
    private $client;
    /** @var Builder */
    private $builder;

    private function __construct(Client $client, Builder $builder)
    {
        $this->client = $client;
        $this->builder = $builder;
    }

    /**
     * @param string $appKey
     * @param string $appSecret
     * @return SDK
     */
    public static function buildNewSDK(string $appKey, string $appSecret)
    {
        return new self(
            new Client(new HttpClient(), new Signer($appSecret), $appKey, $appSecret),
            new Builder()
        );
    }

    public function auth(): UserManagement
    {
        return new UserManagement($this->client);
    }

    public function profiles(): Profiles
    {
        return new Profiles($this->client);
    }
}