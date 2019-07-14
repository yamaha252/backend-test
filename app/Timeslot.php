<?php

/**
 * Class Timeslot
 */
abstract class Timeslot
{
    /**
     * @var Artist
     */
    private $artist;

    /**
     * @var string
     */
    private $description;

    /**
     * @var DateTime
     */
    private $startsAt;

    /**
     * @var DateTime
     */
    private $endsAt;

    /**
     * @param Artist $artist
     * @param string $description
     * @param DateTime $startsAt
     * @param DateTime $endsAt
     * @throws InvalidArgumentException
     */
    public function __construct(Artist $artist, string $description, DateTime $startsAt, DateTime $endsAt)
    {
        if (!TimeslotValidator::validate($artist)) {
            throw new InvalidArgumentException('Artist is invalid');
        }
        if (!TimeslotValidator::validate($description)) {
            throw new InvalidArgumentException('Description is invalid');
        }
        if (!TimeslotValidator::validate($startsAt)) {
            throw new InvalidArgumentException('Start date is invalid');
        }
        if (!TimeslotValidator::validate($endsAt)) {
            throw new InvalidArgumentException('End date is invalid');
        }

        $this->artist = $artist;
        $this->description = $description;
        $this->startsAt = $startsAt;
        $this->endsAt = $endsAt;
    }

    /**
     * @return Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getStartsAt()
    {
        return $this->startsAt;
    }

    /**
     * @return DateTime
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }

    /**
     * @param Timeslot $timeslot
     * @return bool
     */
    public function overlaps(Timeslot $timeslot)
    {
        return
            ($this->getStartsAt() >= $timeslot->getStartsAt() && $this->getEndsAt() <= $timeslot->getEndsAt()) ||
            ($this->getStartsAt() >= $timeslot->getStartsAt() && $this->getStartsAt() <= $timeslot->getEndsAt()) ||
            ($this->getStartsAt() <= $timeslot->getStartsAt() && $this->getEndsAt() >= $timeslot->getStartsAt());
    }
}
