<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 9:48 AM
 */

namespace Optime\TriviaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Optime\TriviaBundle\Model\Trivia as ModelTrivia;

abstract class BaseTrivia extends ModelTrivia
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->triviaAnswers = new ArrayCollection();
    }
}