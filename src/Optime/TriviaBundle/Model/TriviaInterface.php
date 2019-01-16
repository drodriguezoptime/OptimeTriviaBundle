<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 9:51 AM
 */

namespace Optime\TriviaBundle\Model;


interface TriviaInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @return array
     */
    static function getStateTrivia();

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName(string $name);

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName(): string;

    /**
     * @param \DateTime $startDate
     * @return mixed
     */
    public function setStartDate(\DateTime $startDate);

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime;

    /**
     * @param \DateTime $endDate
     * @return mixed
     */
    public function setEndDate(\DateTime $endDate);

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime;

    /**
     * @param QuestionInterface $question
     * @return mixed
     */
    public function addQuestion(QuestionInterface $question);

    /**
     * @param QuestionInterface $question
     * @return mixed
     */
    public function removeQuestion(QuestionInterface $question);

    /**
     * @return QuestionInterface
     */
    public function getQuestions(): QuestionInterface;

    public function setQuestions(array $questions);

    /**
     * @param string $state
     * @return mixed
     */
    public function setState(string $state);

    /**
     * @return string
     */
    public function getState(): string;

    /**
     * @param TriviaAnswerInterface $triviaAnswer
     */
    public function addTriviaAnswer(TriviaAnswerInterface $triviaAnswer);

    /**
     * @return TriviaAnswerInterface
     */
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