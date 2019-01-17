<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 10:06 AM
 */

namespace Optime\TriviaBundle\Model;

abstract class TriviaAnswer implements TriviaAnswerInterface
{
    protected $points;
    protected $percent_correct;
    protected $num_correct;
    protected $num_wrong;
    protected $num_empty;
    protected $trivia;
    protected $user;
    protected $createdAt;
    protected $updatedAt;

    public function getPoints(): int
    {
        return $this->points;
    }

    public function setPoints(int $points)
    {
        $this->points = $points;

        return $this;
    }

    public function getPercentCorrect(): int
    {
        return $this->percent_correct;
    }

    public function setPercentCorrect(int $percentCorrect)
    {
        $this->percent_correct = $percentCorrect;

        return $this;
    }

    public function getNumCorrect(): int
    {
        return $this->num_correct;
    }

    public function setNumCorrect(int $numCorrect)
    {
        $this->num_correct = $numCorrect;

        return $this;
    }

    public function getNumWrong(): int
    {
        return $this->num_wrong;
    }

    public function setNumWrong(int $numWrong)
    {
        $this->num_wrong = $numWrong;

        return $this;
    }

    public function getNumEmpty(): int
    {
        return $this->num_empty;
    }

    public function setNumEmpty(int $numEmpty)
    {
        $this->num_empty = $numEmpty;

        return $this;
    }

    public function setTrivia(TriviaInterface $trivia = null)
    {
        $this->trivia = $trivia;

        return $this;
    }

    public function getTrivia(): TriviaInterface
    {
        return $this->trivia;
    }

    public function setUser($user = null)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
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