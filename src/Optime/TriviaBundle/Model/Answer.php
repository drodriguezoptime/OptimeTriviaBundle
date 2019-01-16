<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 10:06 AM
 */

namespace Optime\TriviaBundle\Model;

abstract class Answer implements AnswerInterface
{

    protected $text;
    protected $points;
    protected $valid;
    protected $question;
    protected $createdAt;
    protected $updatedAt;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points)
    {
        $this->points = $points;

        return $points;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function setValid(bool $valid)
    {
        $this->valid = $valid;

        return $this;
    }

    public function getQuestion(): QuestionInterface
    {
        return $this->question;
    }

    public function setQuestion(QuestionInterface $question)
    {
        $this->question = $question;

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