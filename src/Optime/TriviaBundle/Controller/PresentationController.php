<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 15/01/2019
 * Time: 2:28 PM
 */

namespace Optime\TriviaBundle\Controller;


use Optime\TriviaBundle\Entity\BaseTrivia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PresentationController extends Controller
{
    /**
     * @return Response
     */
    public function listAction(): Response
    {
        $triviaRepository = $this->getDoctrine()->getRepository(BaseTrivia::class);
        $trivias = $triviaRepository->getNotTakenTrivias($this->getUser()->getId());

        return $this->render('@OptimeTrivia/Presentation/list.html.twig', [
            'trivias'   =>  $trivias,
            'user'      =>  $this->getUser()
        ]);
    }
}