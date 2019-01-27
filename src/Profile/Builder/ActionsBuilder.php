<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 11:51
 */

namespace XzSoftware\WykopSDK\Profile\Builder;

use XzSoftware\WykopSDK\Profile\Response\Action;
use XzSoftware\WykopSDK\Profile\Response\Actions;
use XzSoftware\WykopSDK\ResponseObjects\Entry;
use XzSoftware\WykopSDK\ResponseObjects\Link;
use XzSoftware\WykopSDK\ResponseObjects\Pagination;

class ActionsBuilder
{
    public function build(array $data): Actions
    {
        $actions = [];
        foreach($data['data'] as $action) {
            $actions[] = new Action(
                $action['type'],
                $action['type'] === 'entry' ? Entry::buildFromRaw($action['entry']) : Link::buildFromRaw($action['link'])
            );
        }

        return new Actions(
            $actions,
            Pagination::buildFromRaw($data['pagination'])
        );
    }
}