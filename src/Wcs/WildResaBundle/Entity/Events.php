<?php

namespace Wcs\WildResaBundle\Entity;

/**
 * Events
 */
class Events
{

    // YAML GENERATED CODE


    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $event_datetime;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;


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
     * Set eventDatetime
     *
     * @param \DateTime $eventDatetime
     *
     * @return Events
     */
    public function setEventDatetime($eventDatetime)
    {
        $this->event_datetime = $eventDatetime;

        return $this;
    }

    /**
     * Get eventDatetime
     *
     * @return \DateTime
     */
    public function getEventDatetime()
    {
        return $this->event_datetime;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Events
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Events
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
