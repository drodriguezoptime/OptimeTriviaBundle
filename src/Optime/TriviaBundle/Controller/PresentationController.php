<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 15/01/2019
 * Time: 2:28 PM
 */

namespace Optime\TriviaBundle\Controller;


use Optime\TriviaBundle\Entity\BaseAnswer;
use Optime\TriviaBundle\Entity\BaseTrivia;
use Optime\TriviaBundle\Service\PresentationActions;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PresentationController extends Controller
{
    /**
     * @return Response
     */
    public function listAction(): Response
    {
        $action = $this->container->get(PresentationActions::class);

        return $action->listAction();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function recentTriviaAction(Request $request)
    {
        $triviaRepository = $this->getDoctrine()->getRepository(BaseTrivia::class);
        $answerRepository = $this->getDoctrine()->getRepository(BaseAnswer::class);
        $userId = $this->getUser()->getId();
        $lastTrivia = $triviaRepository->getLastOneNotTakenTrivia($userId);

        if (count($lastTrivia) === 0) {
            return $this->render('@OptimeTrivia/Presentation/trivia.html.twig');
        }

//        $trivia = new TriviaInterface();
    }
}