<?php

namespace Litvinenko\Common;

use Litvinenko\Common\Lang\En\ErrorMessages;
use Litvinenko\Common\Stub\Validator;

/**
 * Class that powers Varien Object class with data validation rules taken from 'illuminate\validation' pack
 */
abstract class Object extends \Varien_Object
{
    /**
     * Array of data rules. Can be extended by child classes (init it in constructor by merging with parent data rules)
     * Should be built like Laravel form validation rules (see https://scotch.io/tutorials/laravel-form-validation)
     *
     * For example:
     * protected $dataRules  = [
     *    'title'   => 4,
     *    'user_id' => 'asd',
     *    'email'   => 'asd_free@gmail.com',
     *  ];
     *
     * @var array
     */
    protected $dataRules = array();

    public function isValid()
    {
        return $this->validateData($this->_data, $this->getDataRules());
    }

    public function getDataRules()
    {
        return array_merge(parent::getDataRules(), $this->dataRules);
    }

    public function isInvalid()
    {
        return !$this->isValid();
    }

    protected function validateData($data, $dataRules)
    {
        $validator = Validator::make($data, $dataRules, ErrorMessages::getErrorMessages());
        if ($validator->fails())
        {
            $this->setIsValid(false);
            $this->setValidationErrors($validator->errors()->toArray());
        }
        else
        {
            $this->setIsValid(true);
            $this->setValidationErrors(null);
        }

        return $this->getIsValid();
    }
}

// Here is usage example
// <?php
// require 'vendor/autoload.php';

// class RealObject extends Litvinenko\Common\Object
// {
//     public function __construct($data)
//     {
//         $this->dataRules = array_merge(parent::$dataRules, array(
//             'title'   => 'required|integer|between:3,255',
//             'email'   => 'required|email',
//             'user_id' => 'integer',
//             ));

//         parent::__construct($data);
//     }
// }

// class ChildObject extends RealObject
// {
//     public function __construct($data)
//     {
//         $this->dataRules = array_merge(parent::$dataRules, array(
//             'text' => 'required',
//             ));

//         parent::__construct($data);
//     }
// }

// $data = [
//     'title'   => 4,
//     'user_id' => 'not_number',
//     'email'   => 'some_email@gmail.com',
// ];

// $parent = new RealObject($data);
// $child  = new ChildObject($data);

// var_dump($parent->getValidationErrors());
// var_dump($child->getValidationErrors());
