<?php

class TimeslotView {
    /**
     * @var Timeslot
     */
    private $timeslot;

    /**
     * @param Timeslot $timeslot
     */
    public function __construct(Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;
    }

    /**
     * @return int
     */
    public function getDurationInMinutes()
    {
        $start = $this->timeslot->getStartsAt()->getTimestamp();
        $end = $this->timeslot->getEndsAt()->getTimestamp();
        return ($end - $start) / 60;
    }

    /**
     * @param int $length
     * @return string
     */
    public function getDescriptionExcerpt(int $length = 10)
    {
        return substr($this->timeslot->getDescription(), 0, $length);
    }
}
