<?php
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 14:26
 */

namespace XzSoftware\WykopSDK\Test;

use PHPUnit\Framework\TestCase;
use XzSoftware\WykopSDK\Client;
use XzSoftware\WykopSDK\Signer;

class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnProperConnectLink()
    {
        $testSub = new Client(new \GuzzleHttp\Client(), new Signer('secret'), 'key', 'secret');

        $redirect = $testSub->getConnectLink('Haha!');
        $expected = 'https://a2.wykop.pl/Login/Connect/appkey/key/redirect/SGFoYSE%3D/secure/f506577272e4e8fa098161f0d59a3923';
        self::assertEquals($expected, $redirect);
    }
}
