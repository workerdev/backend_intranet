<?php declare(strict_types = 1);

namespace Apixu\Response;

class CurrentWeather
{
    /**
     * @var Location
     *
     * @Serializer\Property("location")
     * @Serializer\Type("Apixu\Response\Location")
     */
    private $location;

    /**
     * @var Current
     *
     * @Serializer\Property("current")
     * @Serializer\Type("Apixu\Response\Current")
     *
     */
    private $current;

    /**
     * @return Location
     */
    public function getLocation() : Location
    {
        return $this->location;
    }

    /**
     * @return Current
     */
    public function getCurrent() : Current
    {
        return $this->current;
    }
}
