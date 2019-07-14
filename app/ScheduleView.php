<?php

/**
 * Class ScheduleView
 */
class ScheduleView {
    /**
     * @var Schedule
     */
    private $schedule;

    /**
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * @return int
     */
    public function getNumberOfTimeslots()
    {
        return $this->schedule->count();
    }

    /**
     * return int
     */
    public function getDurationInMinutes()
    {
        if (!$this->schedule->count()) {
            return 0;
        }
        $start = $this->schedule->first()->getStartsAt()->getTimestamp();
        $end = $this->schedule->last()->getEndsAt()->getTimestamp();
        return ($end - $start) / 60;
    }
}
