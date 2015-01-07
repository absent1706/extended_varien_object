# Extended Varien_Object

Here is Litvinenko\Common\Object class that powers Varien_Object class (see http://docs.magentocommerce.com/Varien/Varien_Object/Varien_Object.html, http://alanstorm.com/magento_varien_object_debugging) with data validation rules taken from 'illuminate\validation' package (https://packagist.org/packages/illuminate/validation).

With this object, you have automatically getters, setters, unsetters and functions like 'has<Property>' (this is what Varien_Object does for you) and can validate data in Varien_Obect with simple rules provided by 'illuminate\validation' package (see http://laravelbook.com/laravel-input-validation/).

Litvinenko\Common\Object class has isValid method that returns TRUE, if object data satisfies object data rules.

For example, for our User object we require login field, user email (which should look like real email) and user id (which should be integer). We will have class like that:
```php
class User extends Litvinenko\Common\Object
{
    protected $dataRules = array(
        'login'   => 'required',
        'email'   => 'required|email',
        'user_id' => 'required|integer',
    );
}
```

Now, we can create some user and check whether it has valid data.

```php
$user = new User([
    'login'   => null,
    'email'   => 'some_email@gmail.com',
    'user_id' => 'not_number',
]);
echo ($user->isValid()) ? "User is valid\n" : "User is invalid\n";
```

We even can get all validation errors

```php
print_r($user->getValidationErrors());
```

That's it!

## Change logs:

 * version 0.0.2: added new convenient validation rules 'float', 'float_strict', 'integer_strict', 'more_than', 'less_than', 'more_than_or_equal', 'less_than_or_equal' (see bootstrap.php)
 * version 0.0.3: added 'object' data rule (see bootstrap.php) and add/remove/set methods for data rules to Litvinenko\Common\Object
