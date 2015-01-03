<?php
require 'vendor/autoload.php';

class User extends Litvinenko\Common\Object
{
    protected $dataRules = array(
        'login'   => 'required',
        'email'   => 'required|email',
        'user_id' => 'required|integer',
    );

    // public function getDataRules()
    // {
    //     return array(
    //     'login'   => 'required',
    //     'email'   => 'required|email',
    //     'user_id' => 'required|integer'
    //     )
    // }
}

class FacebookUser extends User
{
    protected $dataRules = array(
        'facebook_login' => 'required|text',
    );
}

$data = [
    'login'   => 'some_login',
    'user_id' => '123',
    'email'   => 'some_email@gmail.com',
];

$user = new User($data);
$facebook_user = new FacebookUser($data);

echo ($user->isValid()) ? "User is valid\n" : "User is invalid\n";
print_r($user->getValidationErrors());

echo "\n";
echo ($facebook_user->isValid()) ? "Facebook user is valid\n" : "Facebook user is invalid\n";
print_r($facebook_user->getValidationErrors());
