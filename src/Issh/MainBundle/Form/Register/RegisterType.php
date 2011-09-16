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
                ->add('password','password')
                ->add('email','email');
    }
    
    public function getName()
    {
        return 'register';
    }
    
}
?>
