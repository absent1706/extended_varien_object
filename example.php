<?php
require 'vendor/autoload.php';

class User extends Litvinenko\Common\Object
{
    protected $dataRules = array(
        'login'   => 'required',
        'email'   => 'required|email',
        'user_id' => 'required|integer',
    );
}

$user = new User([
    'login'   => null,
    'email'   => 'some_email@gmail.com',
    'user_id' => 'not_number',
]);

echo ($user->isValid()) ? "User is valid\n" : "User is invalid\n";
print_r($user->getValidationErrors());