<?php

/**
 * Class ArtistView
 */
class ArtistView {
    /**
     * @var Artist
     */
    private $artist;

    /**
     * @param Artist $artist
     */
    public function __construct(Artist $artist)
    {
        $this->artist = $artist;
    }

    /**
     * @return string
     */
    public function getInitials()
    {
        /**
         * @TODO: Implementation
         */
        return $this->artist->getName()[0];
    }

    /**
     * @return string
     */
    public function getLowerCase()
    {
        /**
         * @TODO: Implementation
         */
        return strtolower($this->artist->getName());
    }
}
