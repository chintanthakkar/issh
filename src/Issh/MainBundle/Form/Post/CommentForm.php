<?php

namespace Issh\MainBundle\Form\Post;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

class CommentForm extends AbstractType
{
    private $post;
    function __construct(\Issh\MainBundle\Entity\IsshPost $post)
    {
        $this->post = $post;
    }
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('text','text');
        $builder->add('IsshPost','hidden', array('data'=>$this->post->getId(), 'property_path' => false));        
    }
    
    public function getName()
    {
        return 'commentForm';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Issh\MainBundle\Entity\IsshComment'
        );
    }
}
?>
