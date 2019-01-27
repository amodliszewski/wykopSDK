<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 12:47
 */

namespace XzSoftware\WykopSDK;

use XzSoftware\WykopSDK\RequestObjects\ApiObjectInterface;

class Signer
{
    /** @var string  */
    private $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    public function getSignData(ApiObjectInterface $object): string
    {
        $data = $object->getSignerData();
        $postParams = empty($data) ? '' : implode(',', $data);

        return md5(
            $this->secret .
            SDK::API_PREFIX .
            $object->getEndpoint() .
            $postParams
        );
    }
}