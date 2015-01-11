<?php

// register new common validation rules

Litvinenko\Common\Stub\Validator::extend('not_null', function($attribute, $value, $parameters){
    // checks whether value is not null
    // is more 'soft' than 'required' rule: 'required' rule returns false for empty arrays
    // this rule only checks whether attribute is set at all
        return !is_null($value);
});


Litvinenko\Common\Stub\Validator::extend('float', function($attribute, $value, $parameters){
    // checks whether value is float or string containing float
    if (is_float($value) || is_integer($value))
    {
        return true;
    }
    else
    {
        // return true if value is string containing float
        return (is_string($value) && preg_match("#^[\-\+]?[0-9]*(\.[0-9]+)?$#", $value));
    }
});

Litvinenko\Common\Stub\Validator::extend('float_strict', function($attribute, $value, $parameters){
    // strictly checks whether value is float. All strings are rejected
    return (is_float($value) || is_integer($value));
});

Litvinenko\Common\Stub\Validator::extend('integer_strict', function($attribute, $value, $parameters){
    // strictly checks whether value is integer. Unlikely original 'integer' rule, all string values are rejected
    return is_integer($value);
});

Litvinenko\Common\Stub\Validator::extend('more_than', function($attribute, $value, $parameters){
    return (floatval($value) > $parameters[0]);
});

Litvinenko\Common\Stub\Validator::extend('less_than', function($attribute, $value, $parameters){
    return (floatval($value) < $parameters[0]);
});

Litvinenko\Common\Stub\Validator::extend('more_than_or_equal', function($attribute, $value, $parameters){
    return (floatval($value) >= $parameters[0]);
});

Litvinenko\Common\Stub\Validator::extend('less_than_or_equal', function($attribute, $value, $parameters){
    return (floatval($value) <= $parameters[0]);
});

Litvinenko\Common\Stub\Validator::extend('object', function($attribute, $value, $parameters){
    // checks whether value is an object.
    // if first param given (rule is like 'object:\someClass'), also object class is checked
    return (isset($parameters[0])) ? (is_object($value) && ($value instanceof $parameters[0])) : is_object($value);
});


Litvinenko\Common\Stub\Validator::replacer('more_than', function($message, $attribute, $rule, $parameters)
{
    return str_replace(':value', $parameters[0], $message);
});

Litvinenko\Common\Stub\Validator::replacer('less_than', function($message, $attribute, $rule, $parameters)
{
    return str_replace(':value', $parameters[0], $message);
});

Litvinenko\Common\Stub\Validator::replacer('more_than_or_equal', function($message, $attribute, $rule, $parameters)
{
    return str_replace(':value', $parameters[0], $message);
});

Litvinenko\Common\Stub\Validator::replacer('less_than_or_equal', function($message, $attribute, $rule, $parameters)
{
    return str_replace(':value', $parameters[0], $message);
});
Litvinenko\Common\Stub\Validator::replacer('object', function($message, $attribute, $rule, $parameters)
{
    $replaceStr = isset($parameters[0]) ? "instance of '{$parameters[0]}'" : "an object";
    return str_replace(':class_message', $replaceStr, $message);
});
