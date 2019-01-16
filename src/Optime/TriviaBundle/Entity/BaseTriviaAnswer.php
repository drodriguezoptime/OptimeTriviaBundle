<?php
/**
 * @copyright   2019 Optime Consulting. All Rights Reserved
 * @author      David Rodriguez
 * @link        https://optimeconsulting.com
 * Date: 16/01/2019
 * Time: 11:27 AM
 */

namespace Optime\TriviaBundle\Entity;

use Optime\TriviaBundle\Model\TriviaAnswer as ModelTriviaAnswer;

abstract class BaseTriviaAnswer extends ModelTriviaAnswer
{
    protected $id;

    public function getId(): int
    {
        return $this->id;
    }
}