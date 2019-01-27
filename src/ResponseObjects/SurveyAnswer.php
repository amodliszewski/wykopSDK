<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 13:56
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class SurveyAnswer
{
    /** @var int */
    private $id;
    /** @var string */
    private $answer;
    /** @var int */
    private $count;
    /** @var float */
    private $percentage;

    public function __construct(int $id, string $answer, int $count, float $percentage)
    {
        $this->id = $id;
        $this->answer = $answer;
        $this->count = $count;
        $this->percentage = $percentage;
    }

    public static function buildFromRaw(array $data): SurveyAnswer
    {
        return new SurveyAnswer(
            $data['id'],
            $data['answer'],
            $data['count'],
            $data['percentage']
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getPercentage(): float
    {
        return $this->percentage;
    }

}
