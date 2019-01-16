<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 11:29 AM
 */

namespace Optime\TriviaBundle\Entity;

use Optime\TriviaBundle\Model\Answer as ModelAnswer;

abstract class BaseAnswer extends ModelAnswer
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}