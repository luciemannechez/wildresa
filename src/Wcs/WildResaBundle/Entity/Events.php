<?php

namespace Wcs\WildResaBundle\Entity;

/**
 * Events
 */
class Events
{
    /**
     * @return string
     */

    public function __toString() {
        return $this->machines;
    }


    //GENERATED CODE

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $machines;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->machines = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Events
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Events
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Add machine
     *
     * @param \Wcs\WildResaBundle\Entity\Machines $machine
     *
     * @return Events
     */
    public function addMachine(\Wcs\WildResaBundle\Entity\Machines $machine)
    {
        $this->machines[] = $machine;

        return $this;
    }

    /**
     * Remove machine
     *
     * @param \Wcs\WildResaBundle\Entity\Machines $machine
     */
    public function removeMachine(\Wcs\WildResaBundle\Entity\Machines $machine)
    {
        $this->machines->removeElement($machine);
    }

    /**
     * Get machines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMachines()
    {
        return $this->machines;
    }

    /**
     * Set machines
     *
     * @param \Wcs\WildResaBundle\Entity\Machines $machines
     *
     * @return Events
     */
    public function setMachines(\Wcs\WildResaBundle\Entity\Machines $machines = null)
    {
        $this->machines = $machines;

        return $this;
    }


    /**
     * @var string
     */
    private $user;


    /**
     * Set user
     *
     * @param string $user
     *
     * @return Events
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @var string
     */
    private $backgroundColor = "#000";


    /**
     * Set backgroundColor
     *
     * @param string $backgroundColor
     *
     * @return Events
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Get backgroundColor
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }
}
