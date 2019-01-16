<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 10:43 AM
 */

namespace Optime\TriviaBundle\Model;


interface UserInterface
{
    public function getId();
    public function addTriviaAnswer(TriviaAnswerInterface $triviaAnswer);
    public function removeTriviaAnswer(TriviaAnswerInterface $triviaAnswer);
    public function getTriviaAnswers(): TriviaAnswerInterface;
    public function setTriviaAnswers(array $triviaAnswers);

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt = null);

    /**
     * Get created_at
     *
     * @return \DateTime $createdAt
     */
    public function getCreatedAt(): \DateTime;

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt = null);

    /**
     * Get updated_at
     *
     * @return \DateTime $updatedAt
     */
    public function getUpdatedAt(): \DateTime;
}