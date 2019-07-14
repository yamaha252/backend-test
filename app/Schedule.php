<?php

/**
 * Class Schedule
 */
class Schedule implements Iterator, Countable {
    /**
     * @var Timeslot[]
     */
    private $timeslots;

    /**
     * @var int
     */
    private $iteratorPosition = 0;

    /**
     *
     */
    public function __construct()
    {
        $this->timeslots = array();
    }

    /**
     * @param Timeslot $timeslot
     * @return $this
     */
    public function addTimeslot(Timeslot $timeslot)
    {
        if (!$this->overlaps($timeslot)) {
            $this->timeslots[] = $timeslot;
        }

        $this->sortByStartTime();
    }

    /**
     * Sort slots by starting time
     */
    private function sortByStartTime()
    {
        /**
         * @var Timeslot $a
         * @var Timeslot $b
         */
        usort($this->timeslots, function ($a, $b) {
            return $a->getStartsAt() < $b->getStartsAt() ? -1 : 1;
        });
    }

    /**
     * @param Timeslot $timeslot
     * @return bool
     */
    public function overlaps(Timeslot $timeslot)
    {
        foreach ($this->timeslots as $existingSlot) {
            if ($timeslot->overlaps($existingSlot)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->timeslots);
    }

    /**
     * @return void
     */
    function rewind()
    {
        $this->iteratorPosition = 0;
    }

    /**
     * @return mixed
     */
    function current()
    {
        return $this->timeslots[$this->iteratorPosition];
    }

    /**
     * @return int
     */
    function key()
    {
        return $this->iteratorPosition;
    }

    /**
     * @return void
     */
    function next()
    {
        $this->iteratorPosition++;
    }

    /**
     * @return bool
     */
    function valid() {
        return !!$this->timeslots[$this->iteratorPosition];
    }

    /**
     * @return Timeslot
     */
    function first() {
        return $this->timeslots[0];
    }

    /**
     * @return Timeslot
     */
    function last() {
        return $this->timeslots[$this->count() - 1];
    }
}
