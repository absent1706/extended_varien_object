<?php
namespace Litvinenko\Common\Lang\En;

/**
 * Simple class that just contains error messages for output validation errors.
 * It's just a simple frame for Laravel validation messages (app\lang\en\validation.php)
 */
class ErrorMessages
{
    public static function getErrorMessages()
    {
        return array(

            // messages for custom rules from bootstrap.php
            'float'                => ":attribute should be float value (strings are accepted)",
            'float_strict'         => ":attribute should be float value (strings are NOT accepted)",
            'integer_strict'       => ":attribute should be integer (strings are NOT accepted)",
            'more_than'            => ":attribute should be more than :value",
            'less_than'            => ":attribute should be less than :value",
            'more_than_or_equal'   => ":attribute should be more or equal than :value",
            'less_than_or_equal'   => ":attribute should be less or equal than :value",
            'object'               => ":attribute should be :class_message",

            /*
             * Next code was taken from Laravel (app\lang\en\validation.php)
            */

            "accepted"             => ":attribute must be accepted.",
            "active_url"           => ":attribute is not a valid URL.",
            "after"                => ":attribute must be a date after :date.",
            "alpha"                => ":attribute may only contain letters.",
            "alpha_dash"           => ":attribute may only contain letters, numbers, and dashes.",
            "alpha_num"            => ":attribute may only contain letters and numbers.",
            "array"                => ":attribute must be an array.",
            "before"               => ":attribute must be a date before :date.",
            "between"              => array(
                "numeric" => ":attribute must be between :min and :max.",
                "file"    => ":attribute must be between :min and :max kilobytes.",
                "string"  => ":attribute must be between :min and :max characters.",
                "array"   => ":attribute must have between :min and :max items.",
            ),
            "boolean"              => ":attribute param must be true or false.",
            "confirmed"            => ":attribute confirmation does not match.",
            "date"                 => ":attribute is not a valid date.",
            "date_format"          => ":attribute does not match the format :format.",
            "different"            => ":attribute and :other must be different.",
            "digits"               => ":attribute must be :digits digits.",
            "digits_between"       => ":attribute must be between :min and :max digits.",
            "email"                => ":attribute must be a valid email address.",
            "exists"               => "selected :attribute is invalid.",
            "image"                => ":attribute must be an image.",
            "in"                   => "selected :attribute is invalid.",
            "integer"              => ":attribute must be an integer.",
            "ip"                   => ":attribute must be a valid IP address.",
            "max"                  => array(
                "numeric" => ":attribute may not be greater than :max.",
                "file"    => ":attribute may not be greater than :max kilobytes.",
                "string"  => ":attribute may not be greater than :max characters.",
                "array"   => ":attribute may not have more than :max items.",
            ),
            "mimes"                => ":attribute must be a file of type: :values.",
            "min"                  => array(
                "numeric" => ":attribute must be at least :min.",
                "file"    => ":attribute must be at least :min kilobytes.",
                "string"  => ":attribute must be at least :min characters.",
                "array"   => ":attribute must have at least :min items.",
            ),
            "not_in"               => "selected :attribute is invalid.",
            "numeric"              => ":attribute must be a number.",
            "regex"                => ":attribute format is invalid.",
            "required"             => ":attribute param is required.",
            "required_if"          => ":attribute param is required when :other is :value.",
            "required_with"        => ":attribute param is required when :values is present.",
            "required_with_all"    => ":attribute param is required when :values is present.",
            "required_without"     => ":attribute param is required when :values is not present.",
            "required_without_all" => ":attribute param is required when none of :values are present.",
            "same"                 => ":attribute and :other must match.",
            "size"                 => array(
                "numeric" => ":attribute must be :size.",
                "file"    => ":attribute must be :size kilobytes.",
                "string"  => ":attribute must be :size characters.",
                "array"   => ":attribute must contain :size items.",
            ),
            "unique"               => ":attribute has already been taken.",
            "url"                  => ":attribute format is invalid.",
            "timezone"             => ":attribute must be a valid zone.",

            /*
            |--------------------------------------------------------------------------
            | Custom Validation Language Lines
            |--------------------------------------------------------------------------
            |
            | Here you may specify custom validation messages for attributes using the
            | convention "attribute.rule" to name the lines. This makes it quick to
            | specify a specific custom language line for a given attribute rule.
            |
            */

            'custom' => array(
                'attribute-name' => array(
                    'rule-name' => 'custom-message',
                ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Custom Validation Attributes
            |--------------------------------------------------------------------------
            |
            | The following language lines are used to swap attribute place-holders
            | with something more reader friendly such as E-Mail Address instead
            | of "email". This simply helps us make messages a little cleaner.
            |
            */

            'attributes' => array(),

        );
    }
}