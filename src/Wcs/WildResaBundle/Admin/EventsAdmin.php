<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Wcs\WildResaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class EventsAdmin extends Admin
{

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('start', 'doctrine_orm_date_range')
            ->add('machines', null, array(), null, array('expanded' => true, 'multiple' => true))
            ->add('user')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('start','datetime')
            ->add('end','datetime')
            ->add('machines')
            ->add('user')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        // to remove a single route
        $collection->remove('delete');
        // OR remove all route except named ones
        $collection->clearExcept(array('list', 'show'));
    }
}
