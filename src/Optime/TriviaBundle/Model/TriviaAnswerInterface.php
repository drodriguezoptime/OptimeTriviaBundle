<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 10:14 AM
 */

namespace Optime\TriviaBundle\Model;


interface TriviaAnswerInterface
{
    public function getId(): int;
    public function getPoints(): int;
    public function setPoints(int $points);
    public function setPercentCorrect(int $percentCorrect);
    public function getPercentCorrect(): int;
    public function setNumCorrect(int $numCorrect);
    public function getNumCorrect(): int;
    public function setNumWrong(int $numWrong);
    public function getNumWrong(): int;
    public function setNumEmpty(int $numEmpty);
    public function getNumEmpty(): int;
    public function setTrivia(TriviaInterface $trivia = null);
    public function getTrivia(): TriviaInterface;
    public function setUser($user = null);
    public function getUser();

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