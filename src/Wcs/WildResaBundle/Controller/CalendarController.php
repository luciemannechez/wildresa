<?php

namespace Wcs\WildResaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarController extends Controller
{
    public function indexAction()
    {
        return $this->render('WcsWildResaBundle::layout.html.twig');
    }
}
