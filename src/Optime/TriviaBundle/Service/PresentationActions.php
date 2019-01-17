<?php
/**
 * Created by PhpStorm.
 * User: DRODRIGUEZ
 * Date: 17/01/2019
 * Time: 9:13 AM
 */

namespace Optime\TriviaBundle\Service;

use Doctrine\ORM\EntityManager;
use Optime\TriviaBundle\Entity\BaseAnswer;
use Optime\TriviaBundle\Entity\BaseTrivia;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PresentationActions
{
    /**
     * @var EntityManager $em
     */
    private $em;

    private $currentUser;

    public function __construct(EntityManager $entityManager, $currentUser)
    {
        $this->em = $entityManager;
        $this->currentUser = $currentUser;
    }

    /**
     * @return Response
     */
    public function listAction()
    {
        $triviaRepository = $this->em->getRepository(BaseTrivia::class);
//        $trivias = $triviaRepository->getNotTakenTrivias($this->currentUser->getId());
        $trivias = $triviaRepository->getNotTakenTrivias(1);

        return $this->render('@OptimeTrivia/Presentation/list.html.twig', [
            'trivias'   =>  $trivias,
            'user'      =>  $this->currentUser
        ]);
    }

    public function recentTriviaAction(Request $request)
    {
        $triviaRepository = $this->em->getRepository(BaseTrivia::class);
        $answerRepository = $this->em->getRepository(BaseAnswer::class);

        $userId = $this->currentUser->getId();

        var_dump($userId);die;

        $lastTrivia = $triviaRepository->getLastOneNotTakenTrivia($userId);

        if (count($lastTrivia) === 0) {
//            return $this->r
        }
    }
}