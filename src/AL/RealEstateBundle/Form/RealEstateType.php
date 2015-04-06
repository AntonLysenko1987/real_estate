<?php

namespace AL\RealEstateBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RealEstateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address')
            ->add('price')
            ->add('description')
            ->add('is_public')
            ->add('is_activated')
            ->add('latitude')
            ->add('longitude')
            ->add('url')
            ->add('expires_at')
            ->add('created_at')
            ->add('updated_at')
            ->add('category')
            ->add('operation_type')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AL\RealEstateBundle\Entity\RealEstate'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'al_realestatebundle_realestate';
    }
}
