<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 11:29 AM
 */

namespace Optime\TriviaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Optime\TriviaBundle\Model\Question as ModelQuestion;

abstract class BaseQuestion extends ModelQuestion
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }
}