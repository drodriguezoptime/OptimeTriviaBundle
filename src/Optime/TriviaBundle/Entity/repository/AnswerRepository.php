<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 12:51 PM
 */

namespace Optime\TriviaBundle\Entity\repository;


use Doctrine\ORM\EntityRepository;
use Optime\TriviaBundle\Model\AnswerInterface;

class AnswerRepository extends EntityRepository
{
    /**
     * @param AnswerInterface $data
     * @return array
     */
    public function getResultFilters(AnswerInterface $data)
    {
        $query = $this->createQueryBuilder('a');

        if ($data->getText()) {
            $query->andWhere("a.text REGEX ':text'")
                ->setParameter('text', $data->getText());
        }

        if ($data->isValid()) {
            $query->andWhere("a.valid = :valid")
                ->setParameter('valid', $data->isValid());
        }

        if ($data->getQuestion()) {
            $query->andWhere("a.question = :question")
                ->setParameter('question', $data->getQuestion());
        }

        return $query->getQuery()->getResult();
    }

}