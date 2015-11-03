<?php

namespace Wcs\WildResaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Wcs\WildResaBundle\Entity\Events;
use Wcs\WildResaBundle\Form\Type\EventsType;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\HttpFoundation\Response;

/**
 * Events controller.
 *
 */
class EventsController extends Controller
{

    /**
     * Cette action permet de retourner les évenements en Json
     * @return Response
     */
    public function indexAction()
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

        // ne conserver que le type de la machine
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

    /**
     * Creates a new Events entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Events();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $entity->setUser($user);

            if ( $user == "Jérôme" ) {
                $entity->setBackgroundColor("red");
            }

            else if ( $user == "Lucie") {
                $entity->setBackgroundColor("orange");
            }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('wcs_wild_resa_calendar'));
        }

        return $this->render('WcsWildResaBundle:Events:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Events entity.
     *
     * @param Events $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Events $entity)
    {
        $form = $this->createForm(new EventsType(), $entity, array(
            'action' => $this->generateUrl('events_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Reserve'));

        return $form;
    }

    /**
     * Displays a form to create a new Events entity.
     *
     */
    public function newAction($start)
    {
        $entity = new Events();
        $entity->setStart(new \DateTime($start));

        $startDate = new \DateTime($start);
        $startDate->add(new \DateInterval("PT2H"));
        $new_time = $startDate->format('Y-m-d H:i:s');

        $entity->setEnd(new \DateTime($new_time));

        $form   = $this->createCreateForm($entity);

        return $this->render('WcsWildResaBundle:Events:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Events entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WcsWildResaBundle:Events')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Events entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WcsWildResaBundle:Events:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Events entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WcsWildResaBundle:Events')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Events entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WcsWildResaBundle:Events:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Events entity.
    *
    * @param Events $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Events $entity)
    {
        $form = $this->createForm(new EventsType(), $entity, array(
            'action' => $this->generateUrl('events_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Events entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WcsWildResaBundle:Events')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Events entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('wcs_wild_resa_calendar'));
        }

        return $this->render('WcsWildResaBundle:Events:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }
    /**
     * Deletes a Events entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WcsWildResaBundle:Events')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Events entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('wcs_wild_resa_calendar'));
    }

    /**
     * Creates a form to delete a Events entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('events_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
