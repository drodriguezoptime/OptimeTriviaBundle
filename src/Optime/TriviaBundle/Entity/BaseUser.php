<?php
/**
 * Created by PhpStorm.
 * User: DRODRIGUEZ
 * Date: 16/01/2019
 * Time: 3:28 PM
 */

namespace Optime\TriviaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Optime\TriviaBundle\Model\User as ModelUser;

abstract class BaseUser extends ModelUser
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->triviaAnswers = new ArrayCollection();
    }
}