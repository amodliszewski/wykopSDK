<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 17:02
 */

namespace XzSoftware\WykopSDK\MyWykop\Response;

use XzSoftware\WykopSDK\ResponseObjects\Action;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class Actions
{
    /** @var Action[] */
    private $actions;
    /** @var Pagination */
    private $pagination;

    public function __construct(array $actions, Pagination $pagination)
    {
        $this->actions = $actions;
        $this->pagination = $pagination;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }
}