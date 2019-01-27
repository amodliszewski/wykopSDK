<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 15:46
 */

namespace XzSoftware\WykopSDK\Exceptions;

use Exception;

class ApiException extends Exception {
    private $raw;

    public function __construct(string $message = "", int $code = 0, array $raw)
    {
        $this->raw = $raw;
        parent::__construct($message, $code, null);
    }

    public function getRawResponse():array
    {
        return $this->raw;
    }
}