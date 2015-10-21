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
}

