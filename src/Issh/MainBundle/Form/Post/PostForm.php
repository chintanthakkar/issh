<?php

namespace Issh\MainBundle\Form\Post;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PostForm extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('text','text');
    }
    
    public function getName()
    {
        return 'postForm';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Issh\MainBundle\Entity\IsshPost'
        );
    }
}
?>
