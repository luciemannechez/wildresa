<?php

namespace Wcs\WildResaBundle\Entity;

/**
 * EventEntity
 */
class EventEntity extends \ADesigns\CalendarBundle\Entity\EventEntity
{
//
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $bgColor;

    /**
     * @var string
     */
    protected $fgColor;

    /**
     * @var string
     */
    protected $cssClass;

    /**
     * @var \DateTime
     */
    protected $startDatetime;

    /**
     * @var \DateTime
     */
    protected $endDatetime;

    /**
     * @var boolean Is this an all day event?
     */
    protected $allDay = false;

    public function __construct($id, $title, \DateTime $startDatetime, \DateTime $endDatetime = null, $allDay = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->startDatetime = $startDatetime;
        $this->setAllDay($allDay);
        if ($endDatetime === null && $this->allDay === false) {
            throw new \InvalidArgumentException("Must specify an event End DateTime if not an all day event.");
        }
        $this->endDatetime = $endDatetime;
    }

    /**
     * Convert calendar event details to an array
     *
     * @return array $event
     */
    public function toArray()
    {
        $event = array();
        if ($this->id !== null) {
            $event['id'] = $this->id;
        }
        $event['title'] = $this->title;
        $event['start'] = $this->startDatetime->format("Y-m-d\TH:i:sP");
        if ($this->url !== null) {
            $event['url'] = $this->url;
        }
        if ($this->bgColor !== null) {
            $event['backgroundColor'] = $this->bgColor;
            $event['borderColor'] = $this->bgColor;
        }
        if ($this->fgColor !== null) {
            $event['textColor'] = $this->fgColor;
        }
        if ($this->cssClass !== null) {
            $event['className'] = $this->cssClass;
        }
        if ($this->endDatetime !== null) {
            $event['end'] = $this->endDatetime->format("Y-m-d\TH:i:sP");
        }
        $event['allDay'] = $this->allDay;
        $event['editable'] = true;
        return $event;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setBgColor($color)
    {
        $this->bgColor = $color;
    }

    public function getBgColor()
    {
        return $this->bgColor;
    }

    public function setFgColor($color)
    {
        $this->fgColor = $color;
    }

    public function getFgColor()
    {
        return $this->fgColor;
    }

    public function setCssClass($class)
    {
        $this->cssClass = $class;
    }

    public function getCssClass()
    {
        return $this->cssClass;
    }

    public function setStartDatetime(\DateTime $start)
    {
        $this->startDatetime = $start;
    }

    public function getStartDatetime()
    {
        return $this->startDatetime;
    }

    public function setEndDatetime(\DateTime $end)
    {
        $this->endDatetime = $end;
    }

    public function getEndDatetime()
    {
        return $this->endDatetime;
    }

    public function setAllDay($allDay = false)
    {
        $this->allDay = (boolean)$allDay;
    }

    public function getAllDay()
    {
        return $this->allDay;
    }
}
