<?php
require 'vendor/autoload.php';

class RealObject extends Litvinenko\Common\Object
{
    public function __construct($data)
    {
        self::$dataRules = array_merge(parent::$dataRules, array(
            'title'   => 'required|integer|between:3,255',
            'email'   => 'required|email',
            'user_id' => 'integer',
            ));

        parent::__construct($data);
    }
}

class ChildObject extends RealObject
{
    public function __construct($data)
    {
        self::$dataRules = array_merge(parent::$dataRules, array(
            'text' => 'required',
            ));

        parent::__construct($data);
    }
}

$data = [
    'title'   => 4,
    'user_id' => 'not_number',
    'email'   => 'some_email@gmail.com',
];

$parent = new RealObject($data);
$child  = new ChildObject($data);

var_dump($parent->getValidationErrors());
var_dump($child->getValidationErrors());
