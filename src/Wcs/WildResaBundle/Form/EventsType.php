<?php

namespace Wcs\WildResaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start')
            ->add('end')
            ->add('machines', 'entity', array(
                'class' => 'Wcs\WildResaBundle\Entity\Machines',
                'choices' => $machines->getTypeMachine()
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wcs\WildResaBundle\Entity\Events'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wcs_wildresabundle_events';
    }
}
