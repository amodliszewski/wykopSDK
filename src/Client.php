<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 12:38
 */

namespace XzSoftware\WykopSDK;

use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;
use XzSoftware\WykopSDK\Exceptions\ValidationException;
use XzSoftware\WykopSDK\RequestObjects\ApiObjectInterface;
use XzSoftware\WykopSDK\RequestObjects\GetObject;
use XzSoftware\WykopSDK\Exceptions\ApiException;
use XzSoftware\WykopSDK\RequestObjects\PostObject;

class Client
{
    /** @var HttpClient */
    private $httpClient;
    /** @var Signer */
    private $signer;
    /** @var string */
    private $appKey;
    /** @var string */
    private $secret;
    /** @var string */
    private $login;
    /** @var string */
    private $token;

    public function __construct(
        HttpClient $httpClient,
        Signer $signer,
        string $appKey,
        string $appSecret
    ) {
        $this->httpClient = $httpClient;
        $this->signer = $signer;
        $this->appKey = $appKey;
        $this->secret = $appSecret;
    }

    /**
     * @throws ApiException
     */
    protected function request(ApiObjectInterface $object): array
    {
        return $this->handleResponse(
            $this->httpClient->get($this->buildUrl($object), [
                'headers' => [
                    'apisign' => $this->signer->getSignData($object),
                ],
            ])
        );
    }

    /**
     * @throws ApiException
     */
    protected function create(PostObject $object): array
    {
        $multipart = [];
        foreach ($object->getFiles() as $filename => $file) {
            $multipart[] = [
                'name' => 'filename',
                'contents' => $file
            ];
        }

        foreach ($object->getPostParams() as $paramname => $param) {
            if (is_array($param)) {
                foreach ($param as $key => $value) {
                    $multipart[] = [
                        'name' => $paramname . '[' . $key . ']',
                        'contents' => $value
                    ];
                }
            } else {
                $multipart[] = [
                    'name' => $paramname,
                    'contents' => $param
                ];
            }
        }

        return $this->handleResponse(
            $this->httpClient->post($this->buildUrl($object), [
                'headers' => [
                    'apisign' => $this->signer->getSignData($object),
                ],
                'multipart' => $multipart
            ])
        );
    }

    protected function handleResponse(ResponseInterface $response) {
        $result = json_decode($response->getBody()->getContents(), true);

        if (!empty($result['error'])) {
            throw new ApiException($result['error']['message_pl'], $result['error']['code'], $result);
        }

        return $result;
    }

    protected function buildUrl(ApiObjectInterface $object): string
    {
        return SDK::API_PREFIX . $object->getEndpoint();
    }

    public function handle(ApiObjectInterface $object) {
        if (!$object->isValid()) {
            throw new ValidationException('Given object is invalid!');
        }

        $object->setAppKey($this->appKey);
        if (!empty($this->token)) {
            $object->setUserKey($this->token);
        }
        if ($object instanceof GetObject) {
            return $this->request($object);
        } else {
            return $this->create($object);
        }
    }

    public function checkAppKey(string $appKey): bool
    {
        return $appKey === $this->appKey;
    }

    public function getConnectLink(?string $redirectUrl = null): string
    {
        $params = [
            'appkey' => $this->appKey
        ];

        if ($redirectUrl !== null) {
            $params['secure'] = md5($this->secret . $redirectUrl);
            $params['redirect'] = urlencode(base64_encode($redirectUrl));
        }

        ksort($params);

        array_walk($params, function (&$value, $key) {
            $value = $key . '/' . $value;
        });

        return SDK::API_PREFIX . 'Login/Connect/' . implode('/', $params);
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}