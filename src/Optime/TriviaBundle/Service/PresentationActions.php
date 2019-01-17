<?php
/**
 * Created by PhpStorm.
 * User: DRODRIGUEZ
 * Date: 17/01/2019
 * Time: 9:13 AM
 */

namespace Optime\TriviaBundle\Service;

use Doctrine\ORM\EntityManager;
use Optime\TriviaBundle\Entity\Answer;
use Optime\TriviaBundle\Entity\Trivia;
use Optime\TriviaBundle\Entity\TriviaAnswer;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\HttpFoundation\Request;

class PresentationActions
{
    /**
     * @var EntityManager $em
     */
    private $em;

    private $currentUser;

    private $templating;

    public function __construct(EntityManager $entityManager, $currentUser, TwigEngine $templating)
    {
        $this->em = $entityManager;
        $this->currentUser = $currentUser;
        $this->templating =  $templating;
    }

    /**
     * @return false|string
     * @throws \Twig\Error\Error
     */
    public function listAction()
    {
        $triviaRepository = $this->em->getRepository(TriviaAnswer::class);
//        $trivias = $triviaRepository->getNotTakenTrivias($this->currentUser->getId());
//        $trivias = $triviaRepository->getNotTakenTrivias(1);
        return $this->templating->render('@OptimeTrivia/Presentation/list.html.twig', [
            'trivias'  =>  $triviaRepository->findAll()
        ]);
    }

    public function recentTriviaAction(Request $request)
    {
        $triviaRepository = $this->em->getRepository(Trivia::class);
        $answerRepository = $this->em->getRepository(Answer::class);

        $userId = $this->currentUser->getId();

        var_dump($userId);die;

        $lastTrivia = $triviaRepository->getLastOneNotTakenTrivia($userId);

        if (count($lastTrivia) === 0) {
//            return $this->r
        }
    }
}