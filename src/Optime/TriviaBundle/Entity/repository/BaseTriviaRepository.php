<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 11:37 AM
 */

namespace Optime\TriviaBundle\Entity\repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Optime\TriviaBundle\Entity\BaseTrivia;

class BaseTriviaRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function getLastTrivia(): array
    {
        return $this->queryTrivias()
            ->orderBy("t.startDate")
            ->setMaxResults(1)
            ->getQuery()->getResult();
    }

    /**
     * @return QueryBuilder
     */
    private function queryTrivias(): QueryBuilder
    {
        $date = date('Y-m-d');

        $parameters = [
            'state'         =>  BaseTrivia::ENABLED,
            'startDate'     =>  $date,
            'endDate'       =>  $date
        ];

        $query = $this->createQueryBuilder('t')
            ->where('t.state = :state')
            ->andWhere("t.startDate <= :startDate")
            ->andWhere("t.endDate >= :endDate")
            ->orderBy("t.id", "DESC")
            ->setParameters($parameters);

        return $query;
    }

    /**
     * @param array $data
     * @return array
     */
    public function getResultFilters(array $data)
    {
        if ($data) {
            $data = $data['trivia_filter'];
        }

        $query = $this->createQueryBuilder('t')
            ->select('t, (SELECT DISTINCT COUNT(ta) FROM BaseTrivia ta where ta.trivia = t) as quantity');

        if (isset($data["name"]) and !empty($data["name"])) {
            $query->andWhere(
                $query->expr()->like('t.name', ':name')
            )
                ->setParameter('name', '%' . $data["name"] . '%');
        }

        if (isset($data["startDate"]) and isset($data["findStartDate"]) and $data["startDate"] != "") {
            $query->andWhere('t.startDate = :startDate')
                ->setParameter('startDate', $data["startDate"]);
        }

        if (isset($data["endDate"]) and isset($data["findEndDate"]) and $data["endDate"] != "") {
            $query->andWhere('t.endDate = :endDate')
                ->setParameter('endDate', $data["endDate"]);
        }

        if (isset($data["state"]) and !empty($data["state"])) {
            $query->andWhere("t.state = :state")
                ->setParameter("state", $data["state"]);
        } else {
            $query->andWhere("t.state = :state")
                ->setParameter("state", BaseTrivia::ENABLED);
        }

        $query->orderBy("t.id", "DESC");

        return $query->getQuery()->getResult();
    }

    /**
     * @param $dql
     * @param int $page
     * @param int $limit
     * @return Paginator
     */
    public function paginate($dql, $page = 1, $limit = 5): Paginator
    {
        $paginator = new Paginator($dql);
        $first = $limit * ($page - 1);
        $paginator->getQuery()
            ->setFirstResult($first)
            ->setMaxResults($limit);

        return $paginator;
    }

    /**
     * @param int $userId
     * @return Query
     */
    private function getPendingTrivias(int $userId): Query
    {
        $date = date('Y-m-d');

        $query = $this->getEntityManager()->createQuery(
            'SELECT t
                FROM
                    OptimeTriviaBundle\Entity\Trivia t
                WHERE
                    NOT EXISTS (
                        SELECT ta FROM OptimeTriviaBundle\Entity\TriviaAnswer ta WHERE ta.user = :userId AND ta.trivia = t.id
                    )
                    AND t.state = :state
                    AND t.startDate <= :startDate
                    AND t.endDate >= :endDate
                ORDER BY t.startDate'
        )->setParameters([
            'userId'    =>  $userId,
            'state'     =>  BaseTrivia::ENABLED,
            'startDate' =>  $date,
            'endDate'   =>  $date
        ]);

        return $query;
    }

    /**
     * @param int $userId
     * @return array
     */
    public function getLastOneNotTakenTrivia(int $userId): array
    {
        return $this->getPendingTrivias($userId)
            ->setMaxResults(1)
            ->getResult();
    }

    /**
     * @param int $userId
     * @return array
     */
    public function getNotTakenTrivias(int $userId): array
    {
        return $this->getPendingTrivias($userId)
            ->getResult();
    }
}