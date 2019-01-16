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

class BaseTriviaAnswerRepository extends EntityRepository
{
    /**
     * Validate trivia taken
     *
     * @param int $userId
     * @param int $triviaId
     * @return bool
     */
    public function isTaken(int $userId, int $triviaId)
    {
        $parameters = [
            'user'  =>  $userId,
            'trivia'    =>  $triviaId
        ];
        $query = $this->createQueryBuilder('t')
            ->where('t.user = :user')
            ->andWhere('t.trivia = :trivia')
            ->setParameters($parameters);

        $result = $query->getQuery()->getArrayResult();

        return count($result) > 0;
    }
}