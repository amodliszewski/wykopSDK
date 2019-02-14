<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 14/02/2019
 * Time: 19:04
 */

namespace XzSoftware\WykopSDK\Links;

use XzSoftware\WykopSDK\Client;

class Comments
{
    /** @var Client */
    private $client;

    /**
     * Links constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAll(){}
    public function voteUp(){}
    public function voteDown(){}
    public function voteCancel(){}
    public function add(){}
    public function edit(){}
    public function get(){}

}