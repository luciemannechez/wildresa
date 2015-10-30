<?php

namespace Wcs\WildResaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Wcs\WildResaBundle\Entity\Events;
use Wcs\WildResaBundle\Entity\Machines;


class CalendarController extends Controller
{
    public function indexAction()
    {
        return $this->render('WcsWildResaBundle::layout.html.twig');
    }

    public function eventsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WcsWildResaBundle:Events')->findAll();

        $normalizer = new ObjectNormalizer();

        $encoder = new JsonEncoder();

        $dateCallback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };


        $machineCallback = function ($machines) {
            $result = [];
            foreach ($machines as $mach)
            {
                $result[] = $mach->getTypeMachine();
            }
            return $result;
        };

        $normalizer->setCallbacks(array('start' => $dateCallback, 'end' => $dateCallback, 'machines' => $machineCallback));

        $serializer = new Serializer(array($normalizer), array($encoder));
        $jsonObject = $serializer->serialize($entities, 'json');

        return new Response($jsonObject);
    }
}
