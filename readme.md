# Extended Varien_Object #

Here is Litvinenko\Common\Object class that powers Varien_Object class (see http://docs.magentocommerce.com/Varien/Varien_Object/Varien_Object.html, http://alanstorm.com/magento_varien_object_debugging) with data validation rules taken from 'illuminate\validation' package (https://packagist.org/packages/illuminate/validation).

With this object, you have automatically getters, setters, unsetters and functions like 'has<Property>' (this is what Varien_Object does for you) and can validate data in Varien_Obect with simple rules provided by 'illuminate\validation' package (see http://laravelbook.com/laravel-input-validation/).

When we create Litvinenko\Common\Object, we can set data to it (this is feature of Varien_Object, of course). In Litvinenko\Common\Object constructor, data given to this constructor will be validated. If data is invalid

```
#!php
abstract class Object extends \Varien_Object
{
    protected static $dataRules = array();

    public function __construct($data)
    {
        $this->validateData($data, self::$dataRules);
    }

    public function isValid()
    {
        return $this->getIsValid();
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
    }
}
```

For example, for our User object we require login field (which can have from 3 to 255 symbols), user email (which should look like real email) and user id (which should be integer). We will have next data rules:

```
#!php
 $dataRules = array(
            'login'   => 'required|between:3,255',
            'email'   => 'required|email',
            'user_id' => 'required|integer',
            );
```

and the class is
```
#!php
class User extends Litvinenko\Common\Object
{
    public function __construct($data)
    {
        self::$dataRules = array_merge(parent::$dataRules,array(
            'login'   => 'required',
            'email'   => 'required|email',
            'user_id' => 'required|integer',
        ));

        parent::__construct($data);
    }
}
```

Also, we have FacebookUser class extending User. Facebook users have additional 'facebook_login' field which should be validated as well as other User fields:

```
#!php
class FacebookUser extends User
{
    public function __construct($data)
    {
        self::$dataRules = array_merge(parent::$dataRules, array(
            'facebook_login' => 'required|text',
        ));

        parent::__construct($data);
    }
}
```

Now,