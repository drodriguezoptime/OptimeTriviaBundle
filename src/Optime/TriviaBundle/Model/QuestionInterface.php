<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 10:15 AM
 */

namespace Optime\TriviaBundle\Model;


interface QuestionInterface
{
    public function getId();
    public function getType(): string;
    public function setType(string $type);
    public function getText(): string;
    public function setText(string $text);
    public function getTrivia(): TriviaInterface;
    public function setTrivia(TriviaInterface $trivia);
    public function getAnswers(): AnswerInterface;
    public function setAnswers(array $answers);
    public function addAnswer(AnswerInterface $answer);
    public function removeAnswer(AnswerInterface $answer);

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