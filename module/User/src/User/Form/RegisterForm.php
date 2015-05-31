<?php
namespace User\Form;

use Zend\Form\Form;

class RegisterForm extends Form
{
    /**
     * The registerform constructor
     */
    public function __construct()
    {
        parent::__construct('registerForm');

        $this->setAttributes(array(
            'method' => 'post',
            'class' => 'standardForm'
        ));

        $this->add(array(
            'name' => 'security',
            'type' => 'Zend\Form\Element\Csrf'
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'submit'
        ));

        $this->setValidationGroup(array(
//            'security',
            'user' => array(
                'username',
                'email',
                'password',
                'repassword'
            )
        ));
    }
}