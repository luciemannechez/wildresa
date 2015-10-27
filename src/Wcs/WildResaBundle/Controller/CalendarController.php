<?php

namespace Wcs\WildResaBundle\Controller;

use Doctrine\ORM\Id\BigIntegerIdentityGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Config\Definition\IntegerNode;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use JMS\Serializer\SerializerBuilder;


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
        $normalizer->setIgnoredAttributes(array('machines'));
        $encoder = new JsonEncoder();

        $callback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        $normalizer->setCallbacks(array('start' => $callback, 'end' => $callback));

        $serializer = new Serializer(array($normalizer), array($encoder));
        $jsonObject = $serializer->serialize($entities, 'json');

        return new Response($jsonObject);
    }
}
