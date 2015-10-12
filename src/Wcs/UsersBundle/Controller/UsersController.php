<?php

namespace Wcs\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WcsUsersBundle:Default:index.html.twig', array('name' => $name));
    }
}
