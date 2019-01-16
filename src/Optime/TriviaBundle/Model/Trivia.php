<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 9:59 AM
 */

namespace Optime\TriviaBundle\Model;

abstract class Trivia implements TriviaInterface
{
    const ENABLED = "ENABLED";
    const DISABLED = "DISABLED";

    protected $name;
    protected $startDate;
    protected $endDate;
    protected $state;
    protected $questions;
    protected $triviaAnswers;
    protected $createdAt;
    protected $updatedAt;

    /**
     * {@inheritdoc}
     */
    public static function getStateTrivia()
    {
        $state = [
            self::ENABLED => self::ENABLED,
            self::DISABLED => self::DISABLED
        ];
        return $state;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }

    public function getQuestions(): QuestionInterface
    {
        return $this->questions;
    }

    public function setQuestions(array $questions)
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection;

        foreach ($this->questions as $question) {
            $this->addQuestion($question);
        }
    }

    public function addQuestion(QuestionInterface $question)
    {
        $question->setTrivia($this);
        $this->questions[] = $question;

        return $this;
    }

    public function removeQuestion(QuestionInterface $question)
    {
        $this->questions->removeElement($question);
        $question->setTrivia(null);
    }

    public function getTriviaAnswers(): TriviaAnswerInterface
    {
        return $this->triviaAnswers;
    }

    public function setTriviaAnswers(array $triviaAnswers)
    {
        $this->triviaAnswers = new \Doctrine\Common\Collections\ArrayCollection;

        foreach ($this->triviaAnswers as $triviaAnswer) {
            $this->addTriviaAnswer($triviaAnswer);
        }
    }

    public function addTriviaAnswer(TriviaAnswerInterface $triviaAnswer)
    {
        $triviaAnswer->setTrivia($this);
        $this->triviaAnswers[] = $triviaAnswer;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }
}