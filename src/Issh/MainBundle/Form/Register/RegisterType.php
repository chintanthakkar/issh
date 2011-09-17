<?php

namespace Issh\MainBundle\Form\Register;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('firstName','text')
                ->add('lastName','text')
                ->add('userName','text')
                ->add('password', 'repeated', array (
                        'type'            => 'password',
                        'first_name'      => "Password",
                        'second_name'     => "Re-enter Password",
                        'invalid_message' => "The passwords don't match!"
                ))
                ->add('email','email');
    }
    
    public function getName()
    {
        return 'register';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Issh\MainBundle\Entity\IsshUser'
        );
    }
}
?>
