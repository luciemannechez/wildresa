<?php

namespace Wcs\WildResaBundle\Entity;

/**
 * Machines
 */
class Machines
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $typeMachine;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typeMachine
     *
     * @param string $typeMachine
     *
     * @return Machines
     */
    public function setTypeMachine($typeMachine)
    {
        $this->typeMachine = $typeMachine;

        return $this;
    }

    /**
     * Get typeMachine
     *
     * @return string
     */
    public function getTypeMachine()
    {
        return $this->typeMachine;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $events;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add event
     *
     * @param \Wcs\WildResaBundle\Entity\Events $event
     *
     * @return Machines
     */
    public function addEvent(\Wcs\WildResaBundle\Entity\Events $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Wcs\WildResaBundle\Entity\Events $event
     */
    public function removeEvent(\Wcs\WildResaBundle\Entity\Events $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }

    public function __toString() {
        return $this->typeMachine;
    }
}
