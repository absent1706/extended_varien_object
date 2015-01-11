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
     *  protected $dataRules = array(
     *      'login'   => 'required',
     *      'email'   => 'required|email',
     *      'user_id' => 'required|integer',
     *  );
     *
     * @var array
     */
    protected $dataRules = array();

    /**
     * Public shortcut for 'validateData' method
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->validateData($this->_data, $this->getDataRules());
    }

    /**
     * Returns object data rules
     *
     * @return array
     */
    public function getDataRules()
    {
        return $this->dataRules;
    }

    /**
     * Sets object data rules
     *
     * @return \Litvinenko\Common\Object
     */
    public function setDataRules($dataRules)
    {
        $this->dataRules = $dataRules;
        return $this;
    }

    /**
     * Adds object data rule
     *
     * @return \Litvinenko\Common\Object
     */
    public function addDataRule($attribute, $rule)
    {
        $this->dataRules[$attribute] = $rule;
        return $this;
    }

    /**
     * Removes object data rule
     *
     * @return \Litvinenko\Common\Object
     */
    public function removeDataRule($attribute)
    {
        if (isset($this->dataRules[$attribute]))
        {
            unset($this->dataRules[$attribute]);
        }
        return $this;
    }

    /**
     * Returns result opposite to 'isValid()'
     *
     * @return bool
     */
    public function isInvalid()
    {
        return !$this->isValid();
    }

    /**
     * Checks whether object is valid and sets 'is_valid' data row to TRUE or FALSE.
     * If validation failed, writes all errors to 'validation_errors' data row.
     *
     * @param  array $data
     * @param  array $dataRules
     *
     * @return bool
     */
    protected function validateData($data, $dataRules)
    {
        $validator = Validator::make($data, $dataRules, ErrorMessages::getErrorMessages());
        if ($validator->fails())
        {
            // $this->setIsValid(false);
            $result = false;
            $this->setValidationErrors($validator->errors()->toArray());
        }
        else
        {
            // $this->setIsValid(true);
            $result = true;
            $this->setValidationErrors(null);
        }

        return $result;
    }
}

// <?php
// require 'vendor/autoload.php';

// class User extends Litvinenko\Common\Object
// {
//     protected $dataRules = array(
//         'login'   => 'required',
//         'email'   => 'required|email',
//         'user_id' => 'required|integer',
//     );
// }

// $user = new User([
//     'login'   => null,
//     'email'   => 'some_email@gmail.com',
//     'user_id' => 'not_number',
// ]);

// echo ($user->isValid()) ? "User is valid\n" : "User is invalid\n";
// print_r($user->getValidationErrors());
