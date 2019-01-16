<?php
/**
 * Created by PhpStorm.
 * User: DRODRIGUEZ
 * Date: 16/01/2019
 * Time: 3:22 PM
 */

namespace Optime\TriviaBundle\Model;


abstract class User implements UserInterface
{
    protected $triviaAnswers;
    protected $createdAt;
    protected $updatedAt;

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
       $triviaAnswer->setUser($this);
       $this->triviaAnswers[] = $triviaAnswer;

       return $this;
    }

    public function removeTriviaAnswer(TriviaAnswerInterface $triviaAnswer)
    {
        $this->triviaAnswers->removeElement($triviaAnswer);
        $triviaAnswer->setUser(null);
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