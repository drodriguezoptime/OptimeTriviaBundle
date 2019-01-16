<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 10:06 AM
 */

namespace Optime\TriviaBundle\Model;

abstract class Question implements QuestionInterface
{
    const SINGLE = "SINGLE";
    const MULTIPLE = "MULTIPLE";

    protected $type;
    protected $text;
    protected $trivia;
    protected $answers;
    protected $createdAt;
    protected $updatedAt;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
       $this->type = $type;

       return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    public function getTrivia(): TriviaInterface
    {
        return $this->trivia;
    }

    public function setTrivia(TriviaInterface $trivia)
    {
        $this->trivia = $trivia;

        return $this;
    }

    public function getAnswers(): AnswerInterface
    {
        return $this->answers;
    }

    public function setAnswers(array $answers)
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection;

        foreach ($this->answers as $answer) {
            $this->addAnswer($answer);
        }
    }

    public function addAnswer(AnswerInterface $answer)
    {
        $this->answers[] = $answer;
        $answer->setQuestion($this);
    }

    public function removeAnswer(AnswerInterface $answer)
    {
        $this->answers->removeElement($answer);
        $answer->setQuestion(null);
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