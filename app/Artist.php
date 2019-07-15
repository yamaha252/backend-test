<?php

/**
 * Class Artist
 */
class Artist
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param $name string
     * @throws InvalidArgumentException
     */
    public function __construct(string $name)
    {
        if (!AttributeValidator::isNotEmpty($name)) {
            throw new InvalidArgumentException('Name is invalid');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
