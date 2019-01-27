<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 27/01/2019
 * Time: 13:55
 */

namespace XzSoftware\WykopSDK\ResponseObjects;

class Survey
{
    /** @var string */
    private $question;
    /** @var SurveyAnswer[] */
    private $answers;
    /** @var int|null */
    private $userAnswer;

    public static function buildFromRaw(array $data): Survey
    {
        $answers = [];

        foreach ($data['answers'] as $answer) {
            $answers[] = SurveyAnswer::buildFromRaw($answer);
        }

        return new Survey(
            $data['question'],
            $answers,
            $data['user_answer']
        );
    }

    public function __construct(string $question, array $answers, ?int $userAnswer)
    {
        $this->question = $question;
        $this->answers = $answers;
        $this->userAnswer = $userAnswer;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @return SurveyAnswer[]
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function getUserAnswer(): ?int
    {
        return $this->userAnswer;
    }
}