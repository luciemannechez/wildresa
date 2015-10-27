<?php

namespace Wcs\WildResaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Wcs\WildResaBundle\Entity\Machines;
use Application\Sonata\UserBundle\Entity\User;

class EventsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start', 'date', array('read_only' => true))
            ->add('end')
            ->add('machines', 'entity', array(
                'class' => 'Wcs\WildResaBundle\Entity\Machines',
                'expanded' => true,
                'multiple' => true,
                'required' => true

            ))
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
