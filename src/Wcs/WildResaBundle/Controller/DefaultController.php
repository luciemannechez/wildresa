<?php

namespace Wcs\WildResaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WcsWildResaBundle:Default:index.html.twig', array('name' => $name));
    }
}
