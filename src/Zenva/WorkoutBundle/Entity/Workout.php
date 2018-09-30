<?php

namespace Zenva\WorkoutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Workout
 *
 * @ORM\Table(name="workout")
 * @ORM\Entity(repositoryClass="Zenva\WorkoutBundle\Repository\WorkoutRepository")
 */
class Workout
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="occurrenceDate", type="datetime")
     */
    private $occurrenceDate;

    /**
     * @var string
     *
     * @ORM\Column(name="activity", type="string", length=255)
     */
    private $activity;
    
    /**
     * @var float
     * 
     * @ORM\Column(name="hours", type="float")
     */
    private $hours;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set occurrenceDate
     *
     * @param \DateTime $occurrenceDate
     *
     * @return Workout
     */
    public function setOccurrenceDate($occurrenceDate)
    {
        $this->occurrenceDate = $occurrenceDate;

        return $this;
    }

    /**
     * Get occurrenceDate
     *
     * @return \DateTime
     */
    public function getOccurrenceDate()
    {
        return $this->occurrenceDate;
    }

    /**
     * Set activity
     *
     * @param string $activity
     *
     * @return Workout
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }
    
     /**
     * Get hours
     *
     * @return float
     */
    public function getHours()
    {
        return $this->hours;
    }
    
    /**
     * Set hours
     *
     * @param float $hours
     *
     * @return Workout
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }
}

