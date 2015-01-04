<?php
require 'vendor/autoload.php';

class User extends Litvinenko\Common\Object
{
    protected $dataRules = array(
        'login'         => 'required',
        'email'         => 'required|email',
        'user_id'       => 'required|integer',

        // next rules demonstrate custom rules added to Validator in bootstrap.php
        'category_id'   => 'required|integer_strict',
        'permission_id' => 'required|integer_strict',
        'balance'       => 'required|float',
        'rating'        => 'required|float_strict|more_than_or_equal:1.132'
    );
}

$user = new User([
    'login'         => 'some_login',
    'email'         => 'some_email_gmail.com',
    'user_id'       => '1',
    'category_id'   => '1',
    'permission_id' => 1,
    'balance'       => '-10.000',
    'rating'        => 1.132
]);

echo ($user->isValid()) ? "User is valid\n" : "User is invalid\n";
print_r($user->getValidationErrors());
