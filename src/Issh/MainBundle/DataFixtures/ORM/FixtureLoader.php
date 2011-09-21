<?php

namespace Company\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Issh\MainBundle\Entity\IsshCategory;
use Issh\MainBundle\Entity\IsshPost;
use Issh\MainBundle\Entity\IsshComment;
use Issh\MainBundle\Entity\IsshUser;
use Issh\MainBundle\Entity\IsshSlaptastic;
use Issh\MainBundle\Entity\IsshStinger;
 
class FixtureLoader implements FixtureInterface
{
    public function load($manager)
    {
        // create a user
        $user = new IsshUser();
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setEmail('john@example.com');
        $user->setUserName('john@example.com');
        $user->setPassword('john@example.com'); 
        $user->setSalt();
        $user->setCreated();
        $user->setRoles(array('ROLE_USER'));
 
        $manager->persist($user);
 
        $cat = new IsshCategory();
        $cat->setName('Programming');
        $cat->setSlug('programming');
        $manager->persist($cat);
        $cat2 = new IsshCategory();
        $cat2->setName('Exercise');
        $cat2->setSlug('exercise');
        $manager->persist($cat2); 

 
        // create 10 posts
        for ( $i = 0; $i < 10; ++$i )
        {
            $post = new IsshPost();
            ($i % 2) ? $post->setIsshCategory($cat) : $post->setIsshCategory($cat2);
            $post->setIsshUser($user);
            $post->setText(
                'Proin auctor augue enim? Integer adipiscing dolor odio proin? ' .
                'In placerat arcu, turpis turpis et rhoncus? Et integer nascetur ' .
                'arcu! Turpis scelerisque tincidunt proin mauris, dignissim duis ' .
                'enim, ac sagittis auctor eu, ut penatibus nunc rhoncus magna ' .
                'dignissim ut elementum est non! Urna scelerisque auctor, massa ' .
                'turpis parturient, nisi, in tristique amet, lectus montes. ' .
                'Facilisis, nunc? Diam ac, urna sed, sit magna turpis turpis ' .
                'tincidunt porta. Tincidunt porta vut dis adipiscing phasellus, ' .
                'a habitasse vut proin vel habitasse cras placerat, auctor, massa ' .
                'ridiculus adipiscing ac duis a porta? Pulvinar in scelerisque, ' .
                'adipiscing, arcu integer lorem odio est pellentesque adipiscing ' .
                'velit. A, et porta, eros pulvinar! Nisi turpis mattis lundium ac ' .
                'non nunc phasellus penatibus ut magna rhoncus dolor, lundium ultrices.'
            );
            $post->setCreated('2007-12-18 16:35:36');
            //create 2 comments / post
            for ($j = 0; $j < 2; $j++)
            {
                $comment = new IsshComment();
                $comment->setIsshUser($user);
                $comment->setIsshPost($post);
                $comment->setText(
                'Proin auctor augue enim? Integer adipiscing dolor odio proin? ' .
                'In placerat arcu, turpis turpis et rhoncus? Et integer nascetur ' .
                'arcu! Turpis scelerisque tincidunt proin mauris, dignissim duis ' .
                'enim, ac sagittis auctor eu, ut penatibus nunc rhoncus magna '
                );
                $comment->setCreated('2007-12-18 16:35:36');
                $manager->persist($comment);
            }
            $manager->persist($post);
        }
 
        $manager->flush();
    }
}

?>