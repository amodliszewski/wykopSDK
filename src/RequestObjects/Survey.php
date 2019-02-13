<?php
declare(strict_types=1);
/**
 * Created by XZ Software.
 * Smart code for smart wallet
 * http://xzsoftware.pl
 * User adrianmodliszewski
 * Date: 28/01/2019
 * Time: 19:13
 */

namespace XzSoftware\WykopSDK\RequestObjects;

class Survey
{
    /** @var string */
    private $question;
    /** @var string[] */
    private $answers;

    /**
     * Survey constructor.
     * @param string $question
     * @param string[] $answers
     */
    public function __construct(string $question, array $answers = [])
    {
        $this->question = $question;
        $this->answers = $answers;
    }

    /**
     * @param string $question
     */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    /**
     * @param string[] $answers
     */
    public function setAnswers(array $answers): void
    {
        $this->answers = $answers;
    }

    public function addAnswer(string $answer)
    {
        $this->answers[] = $answer;
    }

    public function toParam(): array
    {
        $result = [
            'survey[question]' => $this->question
        ];
        foreach($this->answers as $key => $value) {
            $result['survey[answers]['.$key.']'] = $value;
        }

        return $result;
    }
}