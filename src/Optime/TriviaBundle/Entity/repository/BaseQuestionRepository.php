<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 12:50 PM
 */

namespace Optime\TriviaBundle\Entity\repository;


use Doctrine\ORM\EntityRepository;
use Optime\TriviaBundle\Model\QuestionInterface;

class BaseQuestionRepository extends EntityRepository
{
    public function getResultFilters(QuestionInterface $data) {
        $query = $this->createQueryBuilder('c');

        if ($data->getText()) {
            $query->andWhere("c.text REGEX ':text'")
                ->setParameter('text', $data->getText());
        }

        if ($data->getType()) {
            $query->andWhere("c.type = :type")
                ->setParameter('type', $data->getType());
        }

        if ($data->getTrivia()) {
            $query->andWhere("c.trivia = :trivia")
                ->setParameter('trivia', $data->getTrivia());
        }

        return $query->getQuery()->getResult();
    }
}