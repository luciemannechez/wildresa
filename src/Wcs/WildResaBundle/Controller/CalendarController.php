<?php

namespace Wcs\WildResaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class CalendarController
 * @package Wcs\WildResaBundle\Controller
 *
 * Ce controleur permet afficher le calendrier et ses évènements
 */

class CalendarController extends Controller
{
    /**
     *Cette action permet de retourner la vue qui affiche le calendrier
     * @return Response
     *
     */
    public function indexAction()
    {
        return $this->render('WcsWildResaBundle::layout.html.twig');
    }

}
