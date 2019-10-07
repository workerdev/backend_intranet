<?php declare(strict_types = 1);

namespace Apixu;

use Apixu\Exception\ApixuException;
use Apixu\Response\Conditions;
use Apixu\Response\CurrentWeather;
use Apixu\Response\Forecast\Forecast;
use Apixu\Response\History;
use Apixu\Response\Search;

interface ApixuInterface
{
    /**
     * @deprecated
     */
    const HISTORY_SINCE_FORMAT = 'Y-m-d';

    /**
     * List of weather conditions
     *
     * @return Conditions
     * @throws ApixuException
     */
    public function conditions() : Conditions;

    /**
     * Realtime weather information by city name
     *
     * @param string $query
     * @return CurrentWeather
     * @throws ApixuException
     */
    public function current(string $query) : CurrentWeather;

    /**
     * Finds cities and towns matching your query (autocomplete)
     *
     * @param string $query
     * @return Search
     * @throws ApixuException
     */
    public function search(string $query) : Search;

    /**
     * Weather forecast for up to next 10 days
     *
     * @param string $query
     * @param int $days
     * @param int|null $hour Hourly forecast available for paid license only
     * @return Forecast
     * @throws ApixuException
     */
    public function forecast(string $query, int $days, int $hour = null) : Forecast;

    /**
     * Historical weather information for a city and a date starting 2015-01-01
     *
     * @param string $query
     * @param \DateTime $since
     * @param \DateTime|null $until Range history available for paid license only
     * @return History
     * @throws ApixuException
     */
    public function history(string $query, \DateTime $since, \DateTime $until = null) : History;
}
