<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserCurrentHabitsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->add('userId', IntegerType::class)->add('userHabitId', IntegerType::class)->add('save', SubmitType::class, array('label' => 'Add'));

        $builder->add('userId', EntityType::class, array(
            'class' => 'AppBundle\Entity\User',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.username', 'ASC');
            },
            'choice_label' => 'username'
        ))->add('userHabitId', EntityType::class, array(
            'class' => 'AppBundle\Entity\UserHabits',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('uh')
                    ->orderBy('uh.name', 'ASC');
            },
            'choice_label' => 'name'
        ))->add('save', SubmitType::class, array('label' => 'Add'));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UserCurrentHabits'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usercurrenthabits';
    }


}
