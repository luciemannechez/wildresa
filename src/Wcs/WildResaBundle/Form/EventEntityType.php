<?php

namespace Wcs\WildResaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventEntityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('url', 'url', array('required'    => false, 'empty_data' => 'null'))
            ->add('bgColor', 'text', array('required'    => false, 'empty_data' => 'null'))
            ->add('fgColor', 'text', array('required'    => false, 'empty_data' => 'null'))
            ->add('cssClass', 'text', array('required'    => false, 'empty_data' => 'null'))
            ->add('startDatetime')
            ->add('endDatetime')
            ->add('allDay', 'checkbox', array('required'    => false, 'empty_data' => '0'))
            //->add('event_datetime', 'datetime', array('required' => false, 'empty_data' => ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wcs\WildResaBundle\Entity\EventEntity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wcs_wildresabundle_evententity';
    }
}
