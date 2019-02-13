<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 26/01/2019
 * Time: 18:59
 */

namespace XzSoftware\WykopSDK\Profile;

use XzSoftware\WykopSDK\Client;

use XzSoftware\WykopSDK\Entries\Response\Entries as EntriesResponse;
use XzSoftware\WykopSDK\Profile\Request\Actions;
use XzSoftware\WykopSDK\Profile\Request\AddedLinks;
use XzSoftware\WykopSDK\Profile\Request\Badges;
use XzSoftware\WykopSDK\Profile\Request\BuriedLinks;
use XzSoftware\WykopSDK\Profile\Request\Colors;
use XzSoftware\WykopSDK\Profile\Request\CommentedEntries;
use XzSoftware\WykopSDK\Profile\Request\CommentedLinks;
use XzSoftware\WykopSDK\Profile\Request\Comments;
use XzSoftware\WykopSDK\Profile\Request\DiggedLinks;
use XzSoftware\WykopSDK\Profile\Request\Entries;
use XzSoftware\WykopSDK\Profile\Request\EntriesComments;
use XzSoftware\WykopSDK\Profile\Request\Followed;
use XzSoftware\WykopSDK\Profile\Request\Followers;
use XzSoftware\WykopSDK\Profile\Request\Profile;
use XzSoftware\WykopSDK\Profile\Request\PublishedLinks;
use XzSoftware\WykopSDK\Profile\Request\Rank;
use XzSoftware\WykopSDK\Profile\Request\Related;
use XzSoftware\WykopSDK\Profile\Response\Actions as ActionsResponse;
use XzSoftware\WykopSDK\Profile\Response\Badges as BadgesResponse;
use XzSoftware\WykopSDK\Profile\Response\Comments as CommentsResponse;
use XzSoftware\WykopSDK\Profile\Response\Links;
use XzSoftware\WykopSDK\Profile\Response\Related as RelatedResponse;
use XzSoftware\WykopSDK\Profile\Response\Status;
use XzSoftware\WykopSDK\Profile\Response\Users;
use XzSoftware\WykopSDK\ResponseObjects\Color;
use XzSoftware\WykopSDK\ResponseObjects\User;
use XzSoftware\WykopSDK\UserManagement\Request\Block;
use XzSoftware\WykopSDK\UserManagement\Request\Observe;
use XzSoftware\WykopSDK\UserManagement\Request\Unblock;
use XzSoftware\WykopSDK\UserManagement\Request\Unobserve;

class Profiles {
    private $client;

    public function __construct(Client &$client)
    {
        $this->client = $client;
    }

    public function getProfile(Profile $profile): User
    {
        return $profile
            ->getResponseBuilder()
            ->build($this->client->handle($profile));
    }

    public function getActions(Actions $actions): ActionsResponse
    {
        return $actions
            ->getResponseBuilder()
            ->build($this->client->handle($actions));
    }

    public function getAddedLinks(AddedLinks $links): Links
    {
        return $links
            ->getResponseBuilder()
            ->build($this->client->handle($links));
    }

    public function getCommentedLinks(CommentedLinks $links): Links
    {
        return $links
            ->getResponseBuilder()
            ->build($this->client->handle($links));
    }

    public function getComments(Comments $comments): CommentsResponse
    {
        return $comments
            ->getResponseBuilder()
            ->build($this->client->handle());
    }

    public function getPublishedLinks(PublishedLinks $links): Links
    {
        return $links
            ->getResponseBuilder()
            ->build($this->client->handle($links));
    }

    public function getEntries(Entries $entries): EntriesResponse
    {
        return $entries
            ->getResponseBuilder()
            ->build($this->client->handle($entries));
    }

    public function getCommentedEntries(CommentedEntries $entries): EntriesResponse
    {
        return $entries
            ->getResponseBuilder()
            ->build($this->client->handle($entries));
    }

    public function getEntriesComments(EntriesComments $entries): EntriesResponse
    {
        return $entries
            ->getResponseBuilder()
            ->build($this->client->handle($entries));
    }

    public function getRelatedLinks(Related $related): RelatedResponse
    {
        return $related
            ->getResponseBuilder()
            ->build($this->client->handle($related));
    }

    public function getFollowers(Followers $followers): Users
    {
        return $followers
            ->getResponseBuilder()
            ->build($this->client->handle($followers));
    }

    public function getFollowed(Followed $followed): Users
    {
        return $followed
            ->getResponseBuilder()
            ->build($this->client->handle($followed));
    }

    public function getBadges(Badges $badges): BadgesResponse
    {
        return $badges
            ->getResponseBuilder()
            ->build($this->client->handle($badges));
    }

    public function getDiggedLinks(DiggedLinks $diggedLinks): Links
    {
        return $diggedLinks
            ->getResponseBuilder()
            ->build($this->client->handle($diggedLinks));
    }

    public function getBuriedLinks(BuriedLinks $buriedLinks): Links
    {
        return $buriedLinks
            ->getResponseBuilder()
            ->build($this->client->handle($buriedLinks));
    }

    public function getRank(Rank $rank): Users
    {
        return $rank
            ->getResponseBuilder()
            ->build($this->client->handle($rank));
    }

    public function observe(Observe $observe): Status
    {
        return $observe
            ->getResponseBuilder()
            ->build($this->client->handle($observe));
    }

    public function unobserve(Unobserve $unobserve): Status
    {
        return $unobserve
            ->getResponseBuilder()
            ->build($this->client->handle($unobserve));
    }

    public function block(Block $block): Status
    {
        return $block
            ->getResponseBuilder()
            ->build($this->client->handle($block));
    }

    public function unblock(Unblock $unblock): Status
    {
        return $unblock
            ->getResponseBuilder()
            ->build($this->client->handle($unblock));
    }

    /**
     * @return Color[]
     * @throws \XzSoftware\WykopSDK\Exceptions\ValidationException
     */
    public function getColors(): array
    {
        $data = $this->client->handle(new Colors())['data'];
        $result = [];
        foreach ($data as $row) {
            $result[] = new Color($row['color'], $row['rgb'], $row['hex']);
        }

        return $result;
    }
}
