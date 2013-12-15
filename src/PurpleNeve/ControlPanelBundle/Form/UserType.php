<?php

namespace PurpleNeve\ControlPanelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orgName')
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('fax')
            ->add('address1')
            ->add('address2')
            ->add('title')
            ->add('password')
            ->add('website')
            ->add('active')
            ->add('type')
            ->add('parent')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PurpleNeve\ControlPanelBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'purpleneve_controlpanelbundle_user';
    }
}
