<?php


use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\StringLength as StringLengthValidator;


class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var string
     */
    public $username;
     
    /**
     *
     * @var string
     */
    public $email;
     
    /**
     *
     * @var string
     */
    public $password;
     
    public function initialize(){
        $this->useDynamicUpdate(true);
    }

    /*
     ** Validations and business logic
     */
     
    public function validation()
    {

        $this->validate(
            new PresenceOf(
                array(
                    "field"    => "username",
                    "message"  => "The username is required"
                )
            )
        );

        $this->validate(
            new PresenceOf(
                array(
                    "field"    => "email",
                    "message"  => "The email is required"
                )
            )
        );    

        $this->validate(
            new Email(
                array(
                    "field"    => "email",
                    "message"  => "The email format is invalid"
                )
            )
        );

        $this->validate(
            new Uniqueness(
                array(
                    "field"    => "email",
                    "message"  => "The email is already in the database"
                )
            )
        );

        $this->validate(
            new Uniqueness(
                array(
                    "field"    => "username",
                    "message"  => "The username is already in the database"
                )
            )
        );


        // stupid hashing functions allows any password, that's why validation shouldn't be on a model
        /*
        $this->validate(
            new PresenceOf(
                array(
                    "field"    => "password",
                    "message"  => "The password is required"
                )
            )
        );

        $this->validate(
            new StringLengthValidator(
                array(
                    "field"    => "password",
                    'min' => 2,
                    'messageMinimum' => 'The password needs to be at least 8 characters long'
                )
            )
        );*/
        

        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

}
